<?php 

namespace Ezlogger;

use Illuminate\Support\ServiceProvider;


class EzloggerProvider extends ServiceProvider{
    public function boot(){
        // dd("damn boi!");
    }


    public function register(){
        // $this->app->singleton(Ezlogger::class , function(){
        //     return new Ezlogger();
        // });
    }
}