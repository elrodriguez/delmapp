<?php

namespace App\CoreBilling\WS\Services;

use App\CoreBilling\WS\Response\BillResult;

/**
 * Class BillSender.
 */
class BillSender extends BaseSunat
{
    /**
     * @param string $filename
     * @param string $content
     *
     * @return mixed
     */
    public function send($filename, $content)
    {
        $client = $this->getClient();
        $result = new BillResult();

        try {
            $zipContent = $this->compress($filename . '.xml', $content);
            $params = [
                'fileName' => $filename . '.zip',
                'contentFile' => $zipContent,
            ];

            $response = $client->call('sendBill', ['parameters' => $params]);
            $cdrZip = $response->applicationResponse;
            $result
                ->setCdrResponse($this->extractResponse($cdrZip))
                ->setCdrZip($cdrZip)
                ->setSuccess(true);
        } catch (\SoapFault $e) {
            $result->setError($this->getErrorFromFault($e));
        }

        return $result;
    }
}
