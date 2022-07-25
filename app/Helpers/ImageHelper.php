<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

if (!function_exists('image')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function image($file, $imageName, $folder, $width = Null, $height = Null)
    {
        if (!empty($width) && !empty($height)) {
            $image = $file;
            $name = Str::slug($imageName);
            if (isset($image)) {
                // make unipue name for image
                $currentDate = Carbon::now()->toDateString();
                $imageName = $name . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }
                $makImage = Image::make($image)->resize($width, $height)->stream();
                Storage::disk('public')->put($folder . '/' . $imageName, $makImage);
            }
            return $imageName;
        } else {
            $image = $file;
            $name = Str::slug($imageName);
            if (isset($image)) {
                // make unipue name for image
                $currentDate = Carbon::now()->toDateString();
                $imageName = $name . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }
                $makImage = Image::make($image)->stream();
                Storage::disk('public')->put($folder . '/' . $imageName, $makImage);
            }
            return $imageName;
        }
    }
}
