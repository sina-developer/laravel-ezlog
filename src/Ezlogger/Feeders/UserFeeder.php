<?php

namespace Ezlogger\Feeders;

use Illuminate\Support\Facades\Auth;

class UserFeeder extends Feeder{
    public function handle(array $record){
        if(!Auth::check()) return null;
        return Auth::user();
    }
}