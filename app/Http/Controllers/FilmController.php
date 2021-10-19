<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Validation\Rule;
use DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $films = Film::with('filmGenre')->orderBy('id','DESC')->get();
        $stt = 1;
        return view('backend.film.index',compact('films','stt'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = DB::table('categories')->select('id','name_category')->get();
        $genres = DB::table('genres')->select('id','name_genre')->get();
        $nations = DB::table('nations')->select('id','name_nation')->get();
        return view('backend.film.add',compact('categories','genres','nations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name_film' => 'required|unique:films|max:255',
            'genre' => 'required',
            ],
            [
                'name_film.unique' => 'Đã tồn tại truyện rồi !!',
              'genre.required' => 'Chưa chọn thể loại truyện',

            ]);
        $film = new Film();
        $film->name_film = $data['name_film'];
        $film->othername_film = $request-> othername_film;
        $film->director = $request -> director;
        $film->actor = $request -> actor;
        $film->time = $request -> time;
        $film->status = $request -> status;
        $film->active = $request -> active;
        $film->category_id = $request -> category_id;
        $film->nation_id = $request -> nation_id;
        $film->year = $request -> year;
        $film->description = $request -> description;

        $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        $film->image = $uploadedFileUrl;

        $film->slug_film = Str::of($data['name_film'])->slug('-');
        $film->save();
        $film->filmGenre()->attach($request-> genre);
        return redirect()->route('film.index')->with('status','Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $film = Film::find($id);
        $genreFilm = $film->filmGenre;
        $categoryFilm = $film->filmCategory;
        $genres = Genre::orderBy('name_genre','ASC')->get();
        $categories = Category::orderBy('name_category','ASC')->get();

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
        $film = Film::find($id);
        $data = $request->validate([
            'name_film' =>  ['required',Rule::unique('films')->ignore($film->id, 'id')],
            'genre' => 'required',
            ],
            [
               'name_film.unique' => 'Đã tồn tại truyện rồi !!',
              'genre.required' => 'Chưa chọn thể loại truyện',

            ]);
        $film->filmCategory()->sync($request-> category);
        $film->filmGenre()->sync($request-> genre);

        $film->name_film = $data['name_film'];
        $film->author = $request-> author;
        $film->content_film = $request -> content;
        foreach($request-> genre as $genre_id)
            $film->genre_id = $genre_id[0];
        $img = $request->image;
        if($img)
        {
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $film->image = $uploadedFileUrl;
        }
        $film->status = $request-> status;
        $film->active = $request-> active;
        $film->user_id = $request-> user_id;
        $film->slug_film = Str::of($data['name_film'])->slug('-');
        $film->save();

        return redirect()->route('film.index')->with('status','Đã cập nhật');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Film::where('id',$id)->delete();
        return redirect()->back()->with('status','Đã xóa');
    }
    public function publishfilm(Request $request,$id)
    {
        $film = Film::find($id);
        $film->active = $request-> active;
        $film->save();
        $filmname = $film->name_film;
        if($request-> active == 0)
            $status = 'Đã hủy kích hoạt :';
        else
            $status = 'Đã kích hoạt :';
        return redirect()->back()->with('status',''.$status.''.$filmname.'');
    }
}
