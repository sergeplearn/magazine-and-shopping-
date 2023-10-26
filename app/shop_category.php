<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class shop_category extends Model
{
   use Searchable;

    protected $guarded = [];

    public function setShopcategorynameAttribute($value)
    {
        $this->attributes['shop_category_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }





    public function searchableAs(): string
    {
        return 'shop_categories_index';
    }

    public function toSearchableArray()
    {
        $data = $this->toArray();
        $data['shopping'] = $this->relationship_foo->toArray();
        $data['shop_category'] = $this->relationship_bar->toArray();
        // ... any other data

        return $data;
    }
    /*public function toSearchableArray()
    {
        return [

            'shop_category_name' => $this->shop_category_name,

        ];
    }*/

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function shopping(): HasMany
    {
        return $this->hasMany(shopping::class,'shopcategory_id','id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
