<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact(('laporan')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        return view('laporan.create', compact('kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laporan = $request->validate([
            'kegiatan_id' => 'required',
            'count' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png|required|max:10000',

        ]);

        $laporan['image'] = date('dmyHis') . '.' . $request->file('file')->extension();
        Storage::putFileAs('public/image', $request->file('file'), $laporan['image']);
        unset($laporan['file']);


        Laporan::create($laporan);

        return redirect(route('laporan.index'))->with('message', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the s pecified resource.
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
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
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
        $laporan = $request->validate([
            'count' => 'required'
        ]);
        if ($request->file('file')) {
            $request->validate([
                'file' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);
            $laporan['image'] = date('dmyHis') . '.' . $request->file('file')->extension();
            Storage::putFileAs('public/image', $request->file('file'), $laporan['image']);
            unset($laporan['file']);
        }

        Laporan::find($id)->update($laporan);

        return redirect(route('laporan.index'))->with('message', 'Berhasil Menyunting Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laporan::find($id)->delete();
        return redirect(route('laporan.index'))->with('message', 'Berhasil Menghapus Data');
    }
}
