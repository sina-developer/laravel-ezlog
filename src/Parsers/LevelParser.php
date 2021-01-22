<?php 

namespace Stag\Ezlogger\Parsers;


class LevelParser extends Parser{
    protected $key = "level";
    public function parse(array $record){
        return ["code" => $record["level"] , "name" => $record["level_name"]];
    }
}