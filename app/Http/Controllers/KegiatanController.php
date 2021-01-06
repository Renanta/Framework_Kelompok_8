<?php

namespace App\Http\Controllers;

use App\Category;
use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('kegiatan.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kegiatan = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'location' => 'required'


        ]);

        $kegiatan['slug'] = Str::slug($kegiatan['name']);

        Kegiatan::create($kegiatan);

        return redirect(route('kegiatan.index'))->with('message', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::all();
        $kegiatanId = Kegiatan::findOrFail($id);
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan', 'kegiatan', 'kegiatanId'));
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
        $kegiatan = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'location' => 'required'

        ]);
        $kegiatan['slug'] = Str::slug($kegiatan['name']);

        Kegiatan::find($id)->update($kegiatan);

        return redirect(route('kegiatan.index'))->with('message', 'Berhasil Menyunting Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kegiatan::find($id)->delete();
        return redirect(route('kegiatan.index'))->with('message', 'Berhasil Menghapus Data');
    }
}
