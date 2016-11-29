<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	} 
	
	/**
	 * Display dashboard.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$articles = Article::all();
		
		return view('admin.dashboard', compact('articles'));
	}


}
