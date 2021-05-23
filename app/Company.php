<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'logo', 'website_url',
    ];

    // for foreign key constraint
    public function employee(){
        return $this->hasMany('App\Employee');
    }

}
