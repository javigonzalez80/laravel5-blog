<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tags';
	
	protected $fillable = ['name', 'slug'];
	
	public function articles()
	{
		return $this->belongsToMany('App\Article');
	}

}
