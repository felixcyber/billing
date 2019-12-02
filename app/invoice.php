<?php

namespace App;
//use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    public $table = 'invoices';

    // public function getDateAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    // }

    // public function setDateAttribute($value)
    // {
    //     $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    // }


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'number',
        'summ_1',
        'company_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
