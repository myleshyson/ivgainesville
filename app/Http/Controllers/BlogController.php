<?php

namespace App\Http\Controllers;


use App\Article;
use Carbon\Carbon;
use App\ArticlePhoto;
use Illuminate\Http\Request;
use Acme\Repos\PostsRepoInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    protected $postsRepo;

    /**
     * Posts that goes through middleware.
     *
     * @param PostsRepoInterface $postsRepo
     */
    public function __construct(PostsRepoInterface $postsRepo)
    {
        $this->postsRepo = $postsRepo;

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {   
        $sortBy = \Illuminate\Support\Facades\Request::get('sortBy');
        if($sortBy == '') {
            
            $sortBy = 'published_at';
        }
        $order = \Illuminate\Support\Facades\Request::get('order');
        $articles = $this->postsRepo->getPaginated(compact('sortBy', 'order'));

        return view('dashboard.posts.posts', compact('articles', 'sortBy', 'order'));
    }

    /**
     * Return Create Form
     * @return [type] [description]
     */
    public function create()
    {
       
        $user = Auth::user();
        $article = new Article;
        $article->published_at = Carbon::now();
        $updated = $article->updated_at;
        $now = Carbon::now();
        return view('dashboard.posts.create', compact('user', 'article', 'updated', 'now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'strp',
        //     'body' => 'strp',
        // ]);
        
        $article = $this->createArticle($request);
        $id = $article->id;

        return response()->json([
            'success' => true,
            'message' => 'You did it!',
            'id'      => $id
            ]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $user = Auth::user();
        $updated = $article->updated_at;
        $now = Carbon::now();
        return view('dashboard.posts.edit', compact('article', 'user', 'updated', 'now'));
    }

    public function time()
    {
        $now = Carbon::now();

        return response()->json([
            'time' => $now->format('Y-m-d\TH:i')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article, Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'strp',
        //     'body' => 'strp',
        // ]);

        $this->updateArticle($request, $article);

        return response()->json([
            'success' => true,
            'message' => 'You did it!',
            'updated' => $article->updated_at->toCookieString(),
            'id'      => $article->id
            ]);
    }


    public function addPhoto(Article $article, Request $request)
    {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('article/photos', $name);

        $article->photos()->create(['path' => 'article/photos/' . $name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function photos(Article $article)
    {
        $photo = $article->photos;
        
        return view('dashboard.posts.photos', compact('article', 'photo'));
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        Article::destroy($request->input('ids'));
        
        return response()->json([ 'success' => true, 'message' => 'You did it!' ]);

    }

    /**
     * Deletes a blog photo
     * @param   $id 
     * @return redirect
     */
    public function destroyPhoto($id)
    {
        $photo = ArticlePhoto::findOrFail($id);

        $photo->delete();

        return redirect()->back();
    }
    
    /**
     * Save a new article
     * 
     * @param  ArticleRequest $request [description]
     * @return [type]                  [description]
     */
    private function createArticle(Request $request)
    {
        $published = $request->input('is_published');

        $article = Auth::user()->articles()->save(new Article([
            'title' => $request->input('title'),

            'body' => $request->input('body'),

            'published_at' => null,

            'is_published' => false
            ]));

        return $article;
    }

    private function updateArticle(Request $request, Article $article)
    {
        $published = $request->input('is_published');
            $updated = $article->update([
            'title'        => $request->input('title'),
            'body'         => $request->input('body'),
            'published_at' => $request->input('published_at'),
            'is_published' => filter_var($published, FILTER_VALIDATE_BOOLEAN)
        ]);

        return $updated;
    }
}
