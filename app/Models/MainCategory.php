<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MainCategory extends Model implements JWTSubject
{
    protected $table = 'main_categories';
    protected $fillable = [
        'name_ar','name_en','active','created_at','updated_at'
    ];

    public function scopeSelection($query){
        return $query->select('id','name_'.app()->getLocale() . ' as name','created_at','updated_at') ;
    }

########################################################333
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
