<?php 

namespace Stag\Ezlogger\Parsers;


class MessageParser extends Parser{
    protected $key = "message";
    public function parse(array $record){
        return $record["message"];
    }
}