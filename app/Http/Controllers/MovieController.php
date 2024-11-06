<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $category = Category::pluck('title','id');
    $genre = Genre::pluck('title','id');
    $country = Country::pluck('title','id');
    $list = Movie::orderBy('id', 'DESC')->get();
    return view('admin.movie.form', compact('list', 'genre', 'category', 'country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        
        $get_image = $request->file('image');
        
        if($get_image){
            $get_name_image =$get_image->getClientOriginalName(); //hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image));//[0]=>hinhanh12569.[1]=>jpg
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //hinhanh12569.jpg
            $get_image->move('uploads/movie/',$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
