<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;


class category extends Model
{
    use Searchable;

    protected $guarded = [];


    public function searchableAs(): string
    {
        return 'categories_index';
    }

    public function toSearchableArray()
    {
        return [

            'category_name' => $this->category_name,

        ];
    }




    public function postproduct(): HasMany
    {
        return $this->hasMany(postproduct::class,'category_id','id');
    }
    public function path(){
        return '/postproduct/'. $this->id .'_'.Str::slug($this->category_name);
    }
    public function setCategorynameAttribute($value)
    {
        $this->attributes['category_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
