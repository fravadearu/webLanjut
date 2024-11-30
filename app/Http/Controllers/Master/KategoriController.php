<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $list_content = DB::table('kategori')->get();
        return view('master/listkategori', compact('list_content'));
    }

    public function create()
    {
        return view('master/formkategori');
    }

    public function store(Request $request)
    {
        DB::table('kategori')->insert([
            'kode' => $request->input('code'),
            'nama' => $request->input('name')
        ]);
        return redirect('kategori');
    }


    public function edit($id)
    {
        $detail = DB::table('kategori')->where('id', $id)->first();
        return view('master/ubahkategori', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        DB::table('kategori')->where('id', $id)->update([
            'kode' => $request->input('code'),
            'nama' => $request->input('name')
        ]);
        return redirect('kategori');
    }

    public function hapus($id)
{
    $kategori = DB::table('kategori')->where('id', $id)->first();

    if ($kategori) {
        $kategori->delete();
    }

    return redirect('kategori');
}
}
