<?php 

namespace Ezlogger\Parsers;


abstract class Parser{
    protected $key;
    public function handle(array $record){
        if(!in_array($this->key,array_keys($record))) return null;
        return $this->parse($record);
    }
    public abstract function parse(array $record);
}