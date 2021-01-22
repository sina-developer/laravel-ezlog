<?php

namespace Stag\Ezlogger\Feeders;

use Illuminate\Support\Facades\Auth;

class RequestFeeder extends Feeder{
    public function handle(array $record){
        try {
            $session = request()->session()->all();
        } catch (\Throwable $th) {
            $session = null;
        }
        return [
            "request" => ["url" => request()->url() , "method" => request()->method()],
            "query" => request()->query(),
            "body" => request()->all(),
            "files" => request()->allFiles(),
            "header" => request()->header(),
            "session" => $session,
            "route" => request()->route()->getAction(),
            "methods" => request()->route()->methods(),
        ];
    }
}