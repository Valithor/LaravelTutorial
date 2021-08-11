<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\CreateVideoRequest;
use App\Video;
use App\Category;
use App\User;
use Auth;
use Session;

class VideosController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth', ['only'=>'create']);
    }
    public function index()
    {
        $videos = Video::latest()->get();
        return view('videos.index')->with('videos', $videos);
    }
    public function show($id)
    {
        $video = Video::findOrFail($id);
        $cats = Category::withCount('videos')->orderBy('videos_count', 'desc')->get();
        return view('videos.show', compact('video', 'cats'));
    }
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('videos.create')->with('categories', $categories);
    }
    public function store(CreateVideoRequest $request)
    {
        $video = new Video($request->all());
        Auth::user()->videos()->save($video);

        $categoryIds= $request->input('CategoryList');
        $video->categories()->attach($categoryIds);
        Session::flash('video_created', 'Twoj film zostal dodany');
        return redirect('videos');
    }
    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video', 'categories'));
    }
    public function update($id, CreateVideoRequest $request)
    {
        $video = Video::findOrFail($id);
        $video->update($request->all());
        $video->categories()->sync($request->input('CategoryList'));
        return redirect('videos');
    }
    public function destroy($id)
    {
        $video = Video::destroy($id);
        Session::flash('video_destroyed', 'Twoj film zostal usuniety');
        return redirect('videos');
    }
}
