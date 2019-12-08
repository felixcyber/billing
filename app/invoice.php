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
        'date_end',
        'number',
        'company_id',
        'balance_start',
        'consumption_volume',
        'tariff_estimated',
        'tariff_transmission',
        'tariff_distribution',
        'consumption_cost',
        'paid_summ',
        'consumption_actual',
        'cost_actual',
        'balance_end',


        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
