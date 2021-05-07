<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//validando datos
	public  static $messages = [
		'name.required' => 'Es necesario ingresar un nombre para la categoria.',
		'name.min' => 'El nombre de la cateogria debe tener por lo menos 3 caracteres.',    		
		'description.max' => 'la descripción corta solo admite hasta 250 caracteres.'
		
	];
	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'max:250'
		
	];
	protected $fillable = ['name', 'description'];

    //$category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
    	if($this->image)
    		return '/images/categories/'.$this->image;
    	$firstProduct = $this->products()->first();
    	if($firstProduct)
    		return $firstProduct->featured_image_url;
    	return '/images/default.jpg';
    }
}
