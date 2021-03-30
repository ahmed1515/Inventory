<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'product_no',
        'name',
        'description',
        'image'
    ];

    /** 
     * Accessors
     */
    public function getProductIdAttribute()
    {
        return $this->id;
    }

    public function getProductNoAttribute()
    {
        return $this->product_no;
    }

    public function getNameAttribute()
    {
        return $this->name;
    }

    public function getDescriptionAttribute()
    {
        return $this->description;
    }

    public function getImageUrlAttribute()
    {
        return Storage::get($userid.'/'. $this->image); 
    }

    /** 
     * Mutators
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = $value;
    }

    public function setProductNoAttribute()
    {
        $this->attributes['product_no'] = $value;
    }

    public function setNameAttribute()
    {
        $this->attributes['name'] = $value;
    }
    
    public function setDescriptionAttribute()
    {
        $this->attributes['description'] = $value;
    }

    public function setImageAttribute()
    {
        $this->attributes['image'] = $value;
    }
}
