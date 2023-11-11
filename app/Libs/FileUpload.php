<?php
namespace App\Libs;
use Storage;
use League\Flysystem\MountManager;
use URL;
class FileUpload {

    public static function PostFile($dir,$file,$file_name){
        $param =Storage::disk("public")->putFileAs($dir, $file, $file_name,"public");
        $dir_file = "storage/$dir/".$file_name;
        $getlnik = URL::asset($dir_file);
        return $getlnik;
    }

    public static function GetFile($dir,$file_name,$file_name_dir = true){
        $url = config("app.app_file").$dir."/".$file_name;
        if(!$file_name_dir){
           $url = config("app.app_file").$dir;
        }
        return $url;
    }

    public static function RemoveFile($dir,$file_name){
        $param = Storage::disk('public')->delete($dir."/".$file_name);
        return $param;
    }

    public static function MoveFile($dir_old,$dir_new){
       if(Storage::disk("public")->has($dir_old)){
          $param = Storage::disk('public')->move($dir_old, $dir_new);
          return $param;
       }
        return 0;
    }

    

   
}
?>
