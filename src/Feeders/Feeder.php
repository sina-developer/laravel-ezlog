<?php 

namespace Stag\Ezlogger\Feeders;


abstract class Feeder{
    public abstract function handle(array $record);
}