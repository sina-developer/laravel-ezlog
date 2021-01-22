<?php

namespace Stag\Ezlogger;

use Monolog\Formatter\JsonFormatter;
use Stag\Ezlogger\Sender\Sender;

class EzFormatter extends JsonFormatter{

    private $parsers = [
        "message" => Parsers\MessageParser::class,
        "level" => Parsers\LevelParser::class,
        "exception" => Parsers\StackTraceParser::class,
        "datetime" => Parsers\DateTimeParser::class,
    ];

    private $feeders = [
        "user" => Feeders\UserFeeder::class,
        "request_info" => Feeders\RequestFeeder::class,
        "client" => Feeders\ClientFeeder::class,
        "enviroment" => Feeders\EnviromentFeeder::class,
    ];
    
    public function format(array $record): string
    {
        // dd($record);
        $log = [];
        foreach (array_merge($this->parsers , $this->feeders) as $key => $class) {
            $log [$key] = (new $class())->handle($record);
        }
        // dd($log);
        Sender::send($log);
        return json_encode($log);
        // return json_encode($record);
    }

}