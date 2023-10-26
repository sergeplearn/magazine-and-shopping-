<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Laravel\Scout\Searchable;
use Laravelista\Comments\Commentable;


class postproduct extends Model
{
     use Commentable,Searchable;
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'image_path',
        'sm_img'

    ];

    public function searchableAs(): string
    {
        return 'postproducts_index';
    }

    public function toSearchableArray()
    {
        return [

            'title' => $this->title,

        ];
    }

    public function path(){
        return '/postproduct/'.Str::slug($this->title);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
   // public function setSlugAttribute(){
     //   $this->attributes['slug'] = Str::slug($this->title );
    //}

  public function user():BelongsTo
  {
      return $this->belongsTo(User::class);
  }

}
