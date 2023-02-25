<?php

namespace App\Http\Controllers;

use App\Models\JsonObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    public function store(Request $request)
    {
        DB::enableQueryLog();

        $user = Auth::user();

        $json = new JsonObject([
            'value' => $request->data,
            'author' => $user->id,
        ]);
        $json->save();

        return response(view('submit', [
            'status' => 'Success',
            'message' => 'Json object saved successfully',
            'id' => $json->id,
            'method' => $request->method(),
            'time' => DB::getQueryLog()[0]['time'],
            'author' => $user->name
        ]));
    }
}
