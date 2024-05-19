<?php
namespace classes;
class FileManager {
    public static $dir = "text";
  
    public static function readFile($filename) {
      $filepath = self::$dir . "/" . $filename;
      if (file_exists($filepath)) {
        return file_get_contents($filepath);
      } else {
        return "Файл не знайдено: " . $filename;
      }
    }
  
    public static function writeFile($filename, $content) {
      $filepath = self::$dir . "/" . $filename;
      file_put_contents($filepath, $content, FILE_APPEND);
    }
  
    public static function clearFile($filename) {
      $filepath = self::$dir . "/" . $filename;
      if (file_exists($filepath)) {
        file_put_contents($filepath, "");
      } else {
        echo "Файл не знайдено: " . $filename;
      }
    }
  }
