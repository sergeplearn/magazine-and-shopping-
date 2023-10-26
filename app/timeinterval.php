<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class timeinterval extends Model
{

    protected $fillable = [
        'start_time',
        'end_time',
'status',

    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getStatusAttribute($status)
    {
         return [1 => 'active', 0 => 'inactive'][$status];
        //return $status ? 'Active' : 'Deactive';
    }

    public function getPeriodAttribute($value)
    {
        return $this->start_time .' - '. $this->end_time;
    }

    public function events(): HasMany
    {
        return $this->hasMany(event::class,'timeinterval_id','id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
