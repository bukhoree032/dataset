<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Article;
use Auth;

class ArticleController extends Controller
{
    
    public $data;

    public function __construct()
    {
        $this->data['body'] = [
            'name' => 'article'
        ];
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        dd(\Request::route()->getName());
        return view('article::index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        $data = $this->data;
        $article = Article::where("slug", $slug)->firstOrFail();
        $data['article'] = $article;

        return view('article::show', $data);
    }
}
