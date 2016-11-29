<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model {

	protected $table = 'comments';
	
	protected $fillable = [
		'article_id',
		'name',
		'email',
		'body',
		'approved'
	];
	
	public function scopeApproved($query)
	{
		$query->where('approved', '=', '1');
	}
	
	public function article()
	{
		return $this->belongsTo('App\Article');
	}    

}
