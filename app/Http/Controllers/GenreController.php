<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class GenreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd('abc');
        $genres = Genre::all();
        return view('backend.genre.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.genre.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_genre' => 'required|unique:genres|max:255',
        ],
        [
            'name_genre.unique' => 'Trùng tên!!',
        ]);
        $genre = new Genre();
        $genre->name_genre = $data['name_genre'];
        $genre->description  = $request ->description;
        $genre->slug_genre = Str::of($data['name_genre'])->slug('-');
        $genre->save();
        return redirect()->back()->with('status','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('backend.genre.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $genre = Genre::find($id);
        $data = $request->validate([
            'name_genre' =>  ['required',Rule::unique('genres')->ignore($genre->id, 'id')],
            ],
            [
                'name_genre.unique' => 'Trùng tên!!',
            ]);
        $genre->name_genre = $data['name_genre'];
        $genre->description  = $request ->description;
        $genre->slug_genre = Str::of($data['name_genre'])->slug('-');
        $genre->save();
        return redirect()->route('genre.index')->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::where('id',$id)->delete();
        return redirect()->route('genre.index')->with('status','Đã xóa');
    }
}
