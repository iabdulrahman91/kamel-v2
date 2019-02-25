<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Listing extends Model
{
  protected $fillable = [
    'item','location','price', 'start', 'end'
  ];

  public function user(){
      return $this->belongsTo(User::class);
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
