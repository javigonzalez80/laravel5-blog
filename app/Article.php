<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	protected $table = 'articles';
	
	protected $dates = ['published_at'];
	
	protected $fillable = [
		'category_id',
		'title',
		'slug',
		'meta_description',
		'excerpt',
		'body', 
		'published_at'
	];
	
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}
	
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}
	
	public function getPublishedAtAttribute($date)
	{
		return new Carbon($date);
	}
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function category()
	{
		return $this->belongsTo('App\Category');
	} 

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
	
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
	
	public function getTagListAttribute()
	{
		return $this->tags->lists('id');
	}
	

}
