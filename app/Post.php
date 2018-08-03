<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    /**
     * getFeaturedImageUrlAttribute
     * @param mixed $value 
     * @return mixed 
     */
    public function getFeaturedImageUrlAttribute($value)
    {
        $featured_image_url = "";

        if(! is_null($this->featured_image))
        {
            $imagePath = public_path() . "/img/" . $this->featured_image;
            if (file_exists($imagePath)) {
                $featured_image_url = asset('img/' . $this->featured_image);
            }
        }
        
        return $featured_image_url;
    }
}
