<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Tag;

use Auth;

use Illuminate\Http\Request;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	} 

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::all();
		
		$categories = Category::all();
		
		$tags = Tag::all();
		
		return view('admin.dashboard', compact('articles', 'categories', 'tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::lists('name', 'id');
		
		$tags = Tag::lists('name', 'id');
		
		return view('articles.create', compact('categories', 'tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());
		
		$article->tags()->attach($request->input('tag_list'));
		
		return redirect('admin')->with('flash_message', 'Article has been created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::findOrFail($id);
		
		return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		
		$categories = Category::lists('name', 'id');
		
		$tags = Tag::lists('name', 'id');
		
		return view('articles.edit', compact('article', 'categories', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ArticleRequest $request)
	{
		$article = Article::findOrFail($id);
		
		$article->update($request->all());
		
		$article->tags()->sync($request->input('tag_list', []));
		
		return redirect('admin')->with('flash_message', 'Article has been updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		
		$article->delete();

		return redirect('admin')->with('flash_message', 'Article has been deleted!');
	}

}
