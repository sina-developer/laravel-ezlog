<?php

namespace Ezlogger\Feeders;

use Illuminate\Support\Facades\Auth;

class EnviromentFeeder extends Feeder{
    public function handle(array $record){
        return [
            "framework" => "laravel",
            "locale" => app()->getLocale(),
            "version" => app()->version(),
            "platform" => "php",
            "platform_version" => phpversion(),
        ];
    }
}