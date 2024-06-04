<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Merek;
use Illuminate\Http\Request;
use PDF;
use Storage;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->paginate(3);
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $merek = Merek::all();
        return view('produk.create', compact('kategori','merek'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_produk' => 'required|min:5',
            'harga' => 'required',
            'id_kategori' => 'required',
            'id_merek' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:10',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;
        $produk->id_merek = $request->id_merek;
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/produks', $image->hashName());
        $produk->image = $image->hashName();
        $produk->save();
        return redirect()->route('produk.index');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        $merek = Merek::all();
        return view('produk.edit', compact('produk','kategori','merek'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_produk' => 'required|min:5',
            'harga' => 'required',
            'id_kategori' => 'required',
            'id_merek' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:10',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;
        $produk->id_merek = $request->id_merek;
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/produks', $image->hashName());
        //delete old image
        Storage::delete('public/produks/' . $produk->image);

        $produk->image = $image->hashName();
        $produk->save();
        return redirect()->route('produk.index');

    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete('public/produks/' . $produk->image);
        $produk->delete();
        return redirect()->route('produk.index');

    }
}
