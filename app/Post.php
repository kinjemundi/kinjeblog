<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $dates = ['published_at'];

    /**
     * author
     * @return mixed 
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

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

   /**
    * getDateAttribute
    * @param mixed $value 
    * @return mixed 
    */
   public function getDateAttribute($value)
   {
    //    return $this->created_at->diffForHumans();
       return is_null($this->published_at) ? '' : $this->published_at->toFormattedDateString();
   }

   /**
    * scopeLatestFirst
    * @return mixed 
    */
   public function scopeLatestFirst($query)
   {
       return $query->orderBy('published_at','desc');
   }

   public function scopePublished($query)
   {
       return $query->where("published_at","<=",Carbon::now());
   }
}
