<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use App\Tag;

use Illuminate\Http\Request;

class TagsController extends Controller {

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
		$tags = Tag::all();
		
		return view('tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TagRequest $request)
	{
		Tag::create($request->all());
		
		return redirect('admin/tags')->with('flash_message', 'Tag has been created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tag = Tag::findOrFail($id);
		
		return view('tags.show', compact('tag'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = Tag::findOrFail($id);
		
		return view('tags.edit', compact('tag'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, TagRequest $request)
	{
		$tag = Tag::findOrFail($id);
		
		$tag->update($request->all());
		
		return redirect('admin/tags')->with('flash_message', 'Tag has been updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tag = Tag::findOrFail($id);
		
		$tag->delete();

		return redirect('admin/tags')->with('flash_message', 'Tag has been deleted!');
	}

}
