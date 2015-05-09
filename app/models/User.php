<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    use SoftDeletingTrait;
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    protected $fillable = array('first_name', 'first_last_name', 'second_last_name','email1','school_id', 'email2', 'alternative', 'career');

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']  = Hash::make($value);
    }

    public function roles() 
    {
        return $this->belongsToMany('Role', 'users_roles', 'user_id', 'role_id');
    }

    public function waitingList()
    {
        return $this->hasMany('WaitingList');        
    }

    public function career()
    {
        return $this->hasOne('Career');
    }

    public function getAuthPassword()
    {
        return $this->school_id;
    }

    public function getAuthIdentifier(){
        return $this->school_id;
    }

    public function lab()
    {
        return $this->hasOne('Laboratory');
    }

    public static function boot()
    {
        parent::boot();
         
        static::creating(function($model) {
            static::setNullWhenEmpty($model);
            return true;
        });
        static::updating(function($model) {
            static::setNullWhenEmpty($model);
            return true;
        });

    }
 
    private static function setNullWhenEmpty($model)
    {
        foreach ($model->toArray() as $name => $value) {
            if (empty($value)) {
                $model->{$name} = null;
            }
        }
    }

}
