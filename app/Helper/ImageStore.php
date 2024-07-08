<?php

namespace App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ImageStore
{
    public static function image($img,$path)
    {
        $fileNameExt = $img->getClientOriginalName();
        $fileName = pathinfo($fileNameExt,PATHINFO_FILENAME);
        $fileExt =  $img->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        $uploaded_path = public_path($path);
        $folder1 = $img->move($uploaded_path, $fileNameToStore);

        return $fileNameToStore;
    }
    public static function updateimage($checkimage,$img,$path)
    {
       
   
    }
    
}
