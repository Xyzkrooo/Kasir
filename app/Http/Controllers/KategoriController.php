<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\kategori;
use Illuminate\Http\Request;
use str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        confirmDelete("Delete", 'Are You Sure?');
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:kategori',
        ]);

        $kategori = new kategori();
        $kategori->name = $request->name;
        $kategori->slug = Str::slug($request->name);
        $kategori->save();
        Alert::success('Success', 'Add Data Successfully');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = kategori::all();
        $kategoris = kategori::findOrFail($id);
        return view('admin.kategori.index', compact('kategori', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->name = $request->name;
        $kategori->slug = Str::slug($request->name);
        $kategori->save();
        Alert::success('Success', 'Edit Data Successfully');
        return redirect()->route('kategori.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();
        Alert::success('Success', 'Delete Data Successfully');
        return redirect()->route('kategori.index');

    }
}
