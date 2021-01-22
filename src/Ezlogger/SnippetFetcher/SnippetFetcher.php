<?php 

namespace Ezlogger\SnippetFetcher;

class SnippetFetcher{
    private static $line = 0;
    public static function fetchTraceSnippets(array $traces){
        // dd($traces);
        foreach ($traces as $key => $trace) {
            // dd($trace);
            if(!isset($trace['file'])) {
                $traces[$key]['snippet'] = "";
            }else{
                $dir = $trace['file'];
                $line = $trace['line'];
                self::$line = $line - 1;
                $traces[$key]['snippet'] = self::fetchSnippet($dir);
            }
            if(isset($traces[$key]["args"])){
                $traces[$key]["args"] = array_filter($trace["args"] , function($row){
                    $type = gettype($row);
                    return $type == "string" || $type == "integer" || $type == "float";
                });
            }
        }
        return $traces;
    }

    public static function fetchSnippet(string $dir){
        if(!file_exists($dir)) return null;
        $lines = file($dir);//file in to an array
        try {
            return self::getBlock($lines);
        } catch (\Throwable $th) {
            return "";
        }
    }

    public static function getBlock( array $lines){
        $line = self::$line;
        $start = $line - 15;
        $start = $start < 0 ? 0 : $start;
        $codes = [];
        foreach (array_splice($lines , $start , 31) as $key => $line) {
            $codes [$start + $key + 1] = $line;
        }
        return $codes;
    }
}