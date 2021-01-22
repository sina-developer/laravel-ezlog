<?php

namespace Ezlogger\Feeders;

use Illuminate\Support\Facades\Auth;

class RequestFeeder extends Feeder{
    public function handle(array $record){
        try {
            $session = request()->session()->all();
        } catch (\Throwable $th) {
            $session = null;
        }
        $route = request()->route() ?? null;
        return [
            "request" => ["url" => request()->url() , "method" => request()->method()],
            "query" => request()->query(),
            "body" => request()->all(),
            "files" => request()->allFiles(),
            "header" => request()->header(),
            "session" => $session,
            "route" => $route ? $route->getAction() : null,
            "methods" => $route ? $route->methods() : null,
        ];
    }
}
