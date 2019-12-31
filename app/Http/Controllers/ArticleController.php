<?php

namespace App\Http\Controllers;

use App\services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    // display all articles
    public function index()
    {
        return view('home')
            ->with('posts',$this->articleService->index());
    }

    // display create article page
    public function create()
    {
        return view('create');
    }

    // store input article
    public function store(Request $request)
    {
        $this->articleService->store($request);
        return Redirect('/home');
    }

    // show $id article
    public function show($id)
    {
        return view('show')
            ->with($this->articleService->show($id));
    }

    // show edit article page with $id article
    public function edit($id)
    {
        return view('edit')
            ->with('articles', $this->articleService->edit($id));
    }

    // update $id article 
    public function update(Request $request, $id)
    {
        $this->articleService->update($request, $id);
        return redirect('/home');
    }

    // destroy $id article
    public function destroy($id)
    {
        $this->articleService->destroy($id);
        return redirect('/home');
    }

    // find and show all $catagory article
    public function catagory($catagory)
    {
        return view('home')
            ->with('posts', $this->articleService->catagory($catagory));
    }

    // find and show article which title contains $request->key
    public function search(Request $request)
    {
        return view('home')
            ->with('posts', $this->articleService->search($request->key));
    }

    // find and show article which author is $name
    public function user($name)
    {
        return view('home')
            ->with('posts', $this->articleService->user($name));
    }
}
