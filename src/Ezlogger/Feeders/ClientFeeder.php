<?php

namespace Ezlogger\Feeders;

use Illuminate\Support\Facades\Auth;

class ClientFeeder extends Feeder{
    public function handle(array $record){
        return [
            "ip" => request()->ip(),
            "user_agent" => request()->header('User-Agent'),
        ];
    }
}