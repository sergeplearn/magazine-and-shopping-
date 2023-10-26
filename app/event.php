<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use DateTimeInterface;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Propaganistas\LaravelPhone\PhoneNumber;


class event extends Model
{
    use Searchable;
protected $dates =[
    'date',
];


   protected $guarded = [];


    public function searchableAs(): string
    {
        return 'events_index';
    }

    public function toSearchableArray()
    {
        return [

            'tell' => $this->tell,
            'date' => $this->date,
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,

        ];
    }

    public function setFirstnameAttribute($value)
    {
        $this->attributes['first_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }



    public function getTelliAttribute()
    {

        $tell = new PhoneNumber($this->tell, 'CMR');

        return $tell->formatNational();
    }


    public function getFullnameAttribute($value)
    {
        return $this->first_name . ' '.$this->second_name;
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        // you may give whatever format you want
      return $date->translatedFormat('d-m-Y');
    }



    public function scopeActive($query)
    {
       return $query->where('status',1);
    }

    public function timeinterval(): BelongsTo
    {

        return $this->belongsTo(timeinterval::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
