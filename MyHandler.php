<?php

class MyHandler implements SessionHandlerInterface
{
    public function open($path, $name)
    {
        $name = 'sesid';
        $path = './Session/';
        return true;
    }

    public function read($id)
    {
        return $id;
    }

    public function write($id, $data)
    {
//        ini_set('session.serialize_handler','php_serialize');
//        $a = unserialize($data); (выводит ошибку ансериализации)
        $open = fopen("./Session/sesid_$id.json", "w");
        $setJsonFile = json_encode($_SESSION, JSON_UNESCAPED_UNICODE);
        fwrite($open, $setJsonFile);
        fclose($open);
        return true;

    }

    public function close(): bool
    {
        return true;
    }

    public function destroy($id)
    {
        if (file_exists("./Session/sesif_$id.json")) {
            unlink("./Session/sesid_$id.json");
            return true;
        }
    }

    public function gc($max_lifetime)
    {
        $max_lifetime = 86400;
        return true;
    }
}