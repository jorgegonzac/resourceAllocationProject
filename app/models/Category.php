<?php

class Category extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name','description');
    use SoftDeletingTrait;
    protected $table = 'categories';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each category has many resources
    public function resources() {
        return $this->hasMany('Resource');
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