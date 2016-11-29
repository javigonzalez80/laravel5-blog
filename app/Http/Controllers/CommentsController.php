<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;



use Illuminate\Http\Request;

class CommentsController extends Controller {

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
		$comments = Comment::all();
		
		return view('comments.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$article = Article::lists('title', 'id');
		
		return view('comments.create', compact('article'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommentRequest $request)
	{
		Comment::create($request->all());
		
		return redirect('admin/comments')->with('flash_message', 'Comment has been created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = Comment::findOrFail($id);
		
		return view('comments.show', compact('comment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::findOrFail($id);
		
		$article = Article::lists('title', 'id');
		
		return view('comments.edit', compact('comment', 'article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CommentRequest $request)
	{
		$comment = Comment::findOrFail($id);
		
		$comment->update($request->all());
		
		return redirect('admin/comments')->with('flash_message', 'Comment has been updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = Comment::findOrFail($id);
		
		$comment->delete();

		return redirect('admin/comments')->with('flash_message', 'Comment has been deleted!');
	}

}
