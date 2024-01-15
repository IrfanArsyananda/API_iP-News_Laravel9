<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

function show_response_json($isSuc, $msg, $data)
{
    return response()->json([
        'success' => $isSuc,
        'messages' => $msg,
        'data' => $data
    ]);
}

function unique_code()
{
    $now = Carbon::now();
    return $now->format('ymdhis');
}
