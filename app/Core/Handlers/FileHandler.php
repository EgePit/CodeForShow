<?php
namespace Core\Handlers;

class FileHandler
{
    static $file;

    static function openFile($filename)
    {
        self::$file = fopen($filename, "a");
    }

    static function writeToFile($filename, $text)
    {
        self::openFile($filename);
        fwrite(self::$file, $text);
        self::fileClose();
    }

    static function fileClose()
    {
        fclose(self::$file);
    }
}