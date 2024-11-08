<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specie;
class SpecieController extends Controller
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
        $list = Specie::all();
        return view('admincp.specie.form',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $specie = new Specie();
        $specie->title=$data['title'];
        $specie->slug=$data['slug'];
        $specie->description=$data['description'];
        $specie->status=$data['status'];
        $specie->save();
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
        $specie = Specie::find($id);
        $list = Specie::all();
        return view('admincp.specie.form', compact('list', 'specie')); // Sửa lại ở đây
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $specie = Specie::find($id);
        $specie->title=$data['title'];
        $specie->slug=$data['slug'];
        $specie->description=$data['description'];
        $specie->status=$data['status'];
        $specie->save();
        return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Specie::find($id)->delete();
        return redirect()->back();
    }
}
