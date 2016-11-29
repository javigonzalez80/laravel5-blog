<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CommentFormRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Tag;
use App\Comment;

use Carbon\Carbon;

use Illuminate\Http\Request;

class BlogController extends Controller {

	/**
	 * Display home page.
	 *
	 * @return Response
	 */
	public function home()
	{
		return view('blog.homepage');
	}
	
	/**
	 * Display error page.
	 *
	 * @return Response
	 */
	Public function error()
	{
		return view('errors.error');
	}
	
	/**
	 * Display blog page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest('published_at')->published()->paginate(10);
		
		$articles->setPath('');
		
		$categories = Category::all();
		
		$tags = Tag::all();
		
		return view('blog.index', compact('articles', 'categories', 'tags'));
	}

	/**
	 * Display blog article page.
	 *
	 * @return Response
	 */
	public function single($slug)
	{
		$article = Article::where('slug', $slug)->published()->first();
		
		$comments = $article->comments()->latest('created_at')->approved()->paginate(10);
		
		$comments->setPath('');
		
		$categories = Category::all();
		
		$tags = Tag::all();
		
		return view('blog.single', compact('article', 'comments', 'categories', 'tags'));
	}
	
	/**
	 * Store blog commentform.
	 *
	 * @return Response
	 */
	public function commentform($id, CommentFormRequest $request)
	{
		
		$article = Article::findorFail($id);
		
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->body = $request->body;
		$comment->approved = 0;
        $comment->article()->associate($article);
        $comment->save();
		
		return redirect()->route('blog.commentform', [$article->slug])->with('flash_message', 'Comment has been added and needs to be approved!');
		
	}

	/**
	 * Display category page.
	 *
	 * @return Response
	 */
	public function category($slug)
	{
		$category = Category::where('slug', $slug)->first();
		
		$categories = Category::all();
		
		$articles = $category->articles()->latest('published_at')->published()->paginate(10);
		
		$articles->setPath('');
		
		$tags = Tag::all();
		
		return view('blog.index', compact('category', 'categories', 'articles', 'tags'));
	}

	/**
	 * Display tag page.
	 *
	 * @return Response
	 */
	public function tag($slug)
	{
		$tag = Tag::where('slug', $slug)->first();
		
		$tags = Tag::all();
		
		$articles = $tag->articles()->latest('published_at')->published()->paginate(10);
		
		$articles->setPath('');
		
		$categories = Category::all();
		
		return view('blog.index', compact('tag', 'tags', 'articles', 'categories'));
	}

}
