<?php

namespace Modules\Sales\Http\Controllers;

use App\Models\UserEstablishment;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('sales::index');
    }

    public function establishments()
    {

        $establishments = UserEstablishment::join('set_establishments', 'establishment_id', 'set_establishments.id')
            ->select(
                'set_establishments.id',
                'set_establishments.name',
                'user_establishments.main'
            )
            ->where('user_establishments.user_id', Auth::id())
            ->get();
        if (count($establishments) > 0) {
            return response()->json($establishments->toArray(), 200);
        } else {
            return response()->json([], 200);
        }
    }
}
