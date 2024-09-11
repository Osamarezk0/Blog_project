<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

Trait ImageTrait{

    private function uploadImage($file,$path,$old_file=null)
    {
        if($old_file){
            Storage::disk('public')->delete($old_file);
        }
       $path_image = $file->store($path,[
           'disk' => 'public'
       ]);
       return $path_image;
    }
}
