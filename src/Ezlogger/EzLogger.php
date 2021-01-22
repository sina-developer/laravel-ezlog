<?php 

namespace Ezlogger;

class Ezlogger{
    public function __invoke($logger){
        foreach ($logger->getHandlers() as $key => $handler) {
            $handler->setFormatter(new EzFormatter());   
        }
    }

    public static function Config(){
        return [
            'driver' => 'single',
            'tap' => [Ezlogger::class],
            'path' => storage_path('logs/ezLogger.log'),
        ];
    }
}