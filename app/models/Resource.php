<?php

class Resource extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    protected $fillable = array('name', 'description', 'image','category_id','laboratory_id','tags');
    use SoftDeletingTrait;
    protected $table = 'resources';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    // DEFINE RELATIONSHIPS --------------------------------------------------

    // each resource belongs to a lab
    public function laboratory() {
        return $this->belongsTo('Laboratory');
    }

    // each resource belongs to a category
    public function category() {
        return $this->belongsTo('Category');
    }
    
    // each resource BELONGS to many timetables
    // define our pivot table also
    public function timetables() {
        return $this->belongsToMany('Timetable', 'timetables_resources', 'resource_id', 'timetable_id');
    }

    public function waitingList(){
        return $this->hasMany('WaitingList');        
    }

    public function bookings(){
        return $this->hasMany('Booking');        
    }

    //Method to change empty values to null
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