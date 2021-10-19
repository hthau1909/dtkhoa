<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nation;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class NationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd('abc');
        $nations = Nation::all();
        return view('backend.nation.index',compact('nations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.nation.add');
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
            'name_nation' => 'required|unique:nations|max:255',
        ],
        [
            'name_nation.unique' => 'Trùng tên!!',
        ]);
        $nation = new Nation();
        $nation->name_nation = $data['name_nation'];
        $nation->description  = $request ->description;
        $nation->slug_nation = Str::of($data['name_nation'])->slug('-');
        $nation->save();
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
        $nation = Nation::find($id);
        return view('backend.nation.edit',compact('nation'));
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

        $nation = Nation::find($id);
        $data = $request->validate([
            'name_nation' =>  ['required',Rule::unique('nations')->ignore($nation->id, 'id')],
            ],
            [
                'name_nation.unique' => 'Trùng tên!!',
            ]);
        $nation->name_nation = $data['name_nation'];
        $nation->description  = $request ->description;
        $nation->slug_nation = Str::of($data['name_nation'])->slug('-');
        $nation->save();
        return redirect()->route('nation.index')->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nation::where('id',$id)->delete();
        return redirect()->route('nation.index')->with('status','Đã xóa');
    }
}
