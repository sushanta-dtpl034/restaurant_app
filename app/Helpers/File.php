<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Boolean;

trait File
{
    public $public_path = "/public/images/";
    public $storage_path = "/storage/images/";

    /**
     * Save Original file
     */
    public function file($file, $path, $size_arr = array()): string
    {
        if ($file) {
            $original_file_path = $file->store($this->public_path . $path);
            if (is_array($size_arr) && count($size_arr) > 0) {
                $this->createThumb($file, $original_file_path, $size_arr);
            }
            return preg_replace("/public/", "", $original_file_path);
        }
    }

    /**
     * Function to create thumbnail
     */
    public function createThumb($file, $original_file_path, $size_arr = array()): void
    {
        if (is_array($size_arr) && count($size_arr) > 0) {
            foreach ($size_arr as $val) {
                $width = (isset($val['w']) && $val['w'] > 0) ? $val['w'] : '';
                $height = (isset($val['h']) && $val['w'] > 0) ? $val['h'] : '';
                //thumb path
                $exp_path = explode('/', $original_file_path);
                $imgname = end($exp_path);
                array_pop($exp_path);
                $thumb_path = implode('/', $exp_path);
                //thumb name
                $img_exp = explode('.', $imgname);
                $thumb_name = $img_exp[0] . '_thumb' . $width . '.' . $img_exp[1];
                //save thumb image
                $file->storeAs($thumb_path, $thumb_name);
                $thumb_stroge_path = Storage::path($thumb_path . $thumb_name);
                //rezise image
                $img = Image::make($thumb_stroge_path);
                if ($width > 0 && $height > 0) {
                    $img->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else if ($width > 0) {
                    $img->resize($width, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else if ($height > 0) {
                    $img->resize(null, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $img->save($thumb_stroge_path);
            } //foreach
        }
    }

    /**
     * get thumb image name
     */
    function getThumbName($path, $width): string
    {
        $exp_path = explode('.', $path);
        $ext = end($exp_path);
        array_pop($exp_path);
        return implode('/', $exp_path) . '_thumb' . $width . '.' . $ext;
    }

    /**
     * Delete files with thumbnail
     */
    function deleteFile($file_path, $thumb_arr = array()): Bool
    {
        //delete original
        Storage::delete('public/' . $file_path);
        //delete thumb
        if (is_array($thumb_arr) && count($thumb_arr) > 0) {
            foreach ($thumb_arr as $th) {
                $thumb = str_replace(".", "_thumb" . $th['w'] . ".", $file_path);
                Storage::delete('public/' . $thumb);
            }
        }
        return true;
    }
}
