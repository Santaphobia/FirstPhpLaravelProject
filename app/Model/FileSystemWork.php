<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;


class FileSystemWork extends Model
{
    function writeFile($data) {
        $file = $this->getFile();
        if ($file) {
            $file[] = $data;
            return file_put_contents(dirname(__DIR__) . '/data/feedback.json', \GuzzleHttp\json_encode($file));
        } else {
            return false;
        }
    }

    function getFile() {
        return \GuzzleHttp\json_decode(file_get_contents(dirname(__DIR__) . '/data/feedback.json'), true);
    }
}
