<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Acesso;

class TrackerController extends Controller
{
    public function registrarAcesso(Request $request)
    {
        $ip = $request->ip();
        Acesso::create(['ip' => $ip]);

        return response()->json([ 'success' => true ]);
    }
}
