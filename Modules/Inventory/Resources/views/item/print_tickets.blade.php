<html>
<head>
  <title>Una tabla para ser centrada</title>
</head>
<body style="padding: 0px; margin: 0px">
    <div style="padding: 0px; margin: 0px">
        <table border="1" style="width:100%">

            <tr>
                <td style="padding: 2px;">
                    <h1>C: {{ $item->internal_id }}</h1>
                    <h1>P: {{ $item->sale_price }}</h1>
                    <h1>T: {{ $item->size }}</h1>
                    {{-- <img alt="testing" src="{{ barcode('testing','12345678') }}" /> --}}
                </td>
                <td style="padding: 2px;">
                    <h1>C: {{ $item->internal_id }}</h1>
                    <h1>P: {{ $item->sale_price }}</h1>
                    <h1>T: {{ $item->size }}</h1>
                    {{-- <img alt="testing" src="{{ barcode('testing','12345678') }}" /> --}}
                </td>
            </tr>
           
        </table>
    </div>
</body>
</html>