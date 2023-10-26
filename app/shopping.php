<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

use Laravel\Scout\Searchable;
use Laravelista\Comments\Commentable;

class shopping extends Model
{    use Commentable,Searchable;
    protected $guarded = [];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function searchableAs(): string
    {
        return 'shoppings_index';
    }



    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
             'price' => $this->price,

        ];
    }





    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function shopcategory(): BelongsTo
    {
        return $this->belongsTo(shop_category::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
