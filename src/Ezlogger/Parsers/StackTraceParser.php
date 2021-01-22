<?php 

namespace Ezlogger\Parsers;

use Ezlogger\SnippetFetcher\SnippetFetcher;

class StackTraceParser extends Parser{
    protected $key = "context";
    public function parse(array $record){
        try {
            $exception = $record["context"]['exception'];
        } catch (\Throwable $th) {
            return null;
        }
        $traces = $exception->getTrace() ?? [];
        $first_trace = [
            "file" => $exception->getFile() ?? null,
            "line" => $exception->getLine() ?? null,
        ];
        // if(count($traces)){
        //     if(isset($traces[0]["file"]) && $traces[0]["file"] != $first_trace["file"] && isset($traces[0]["line"]) && $traces[0]["line"] != $first_trace["line"]){
        //         array_unshift($traces , $first_trace);
        //     }
        // }else{
            array_unshift($traces , $first_trace);
        // }
        // dd($traces);
        $error = [
            "message" => $exception->getMessage() ?? null,
            "exception_type" => get_class($exception) ?? null,
            "code" => $exception->getCode() ?? null,
            "file" => $exception->getFile() ?? null,
            "line" => $exception->getLine() ?? null,
            "trace" => SnippetFetcher::fetchTraceSnippets($traces),
        ];

        return $error;
    }
}