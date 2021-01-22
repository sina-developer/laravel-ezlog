<?php 

namespace Stag\Ezlogger\Parsers;


class DateTimeParser extends Parser{
    protected $key = "datetime";
    public function parse(array $record){
        return $record["datetime"];
    }
}