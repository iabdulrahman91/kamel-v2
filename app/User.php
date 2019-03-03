<?php

namespace App;


use Illuminate\Support\Str;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'fname', 'lname', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listings(){
        return $this->hasMany(Listing::class);
    }

    public function rentRequests(){
        return $this->hasMany(RentRequest::class);
    }

    public function addListing(Listing $listing){
        $this->listings()->save($listing);
    }

    public function addRentRequest(RentRequest $rentRequest){

        try{
            $this->rentRequests()->save($rentRequest);
            return true;

        } catch (\Illuminate\Database\QueryException $qe){
            return false;
        }
    }


    // because I used uuid('id')
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
