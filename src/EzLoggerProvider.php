<?php 

namespace Stag\Ezlogger;

use Illuminate\Support\ServiceProvider;


class EzLoggerProvider extends ServiceProvider{
    public function boot(){
        // dd("damn boi!");
    }


    public function register(){
        // $this->app->singleton(Ezlogger::class , function(){
        //     return new Ezlogger();
        // });
    }
}