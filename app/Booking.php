<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Booking extends Model
{
    protected $fillable = [
        'id', 'user_id', 'listing_id', 'start', 'end', 'price'
    ];
    //
    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function listing(){
        return $this->belongsTo(Listing::class);
    }
    // because I used uuid('id')
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($model) {
//            $model->{$model->getKeyName()} = (string) Str::uuid();
//        });
//    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
