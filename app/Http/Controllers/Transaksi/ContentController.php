<?php

namespace App\Http\Controllers\Transaksi;

use App\Exports\ContentExports;
use App\Exports\ContentsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;


class ContentController extends Controller
{
    public function index()
    {
        // select * from content inner join kategori on id = kat_id
        $list = DB::table('content')
            ->join('kategori', 'content.kategori_id', 'kategori.id')->get();
        return view('content/list', compact('list'));
    }

    public function create()
    {
        //$list_kategori_pluck = DB::table('kategori')->pluck('id', 'nama');
        $list_kategori_get = DB::table('kategori')->select('nama', 'id')->get();
        return view('content/create', compact('list_kategori_get'));
    }

    public function store(Request $request)
    {
        DB::table('content')->insert([
            'title' => $request->input('title'),
            'kategori_id' => $request->input('kategori_id'),
            'konten' => $request->input('konten')
        ]);

        return redirect('content');
    }

    public function generatePDF($id)
    {
        $data = DB::table('content')
            ->join('kategori', 'content.kategori_id', 'kategori.id')
            ->where('content_id', $id)
            ->first();
        $pdf = PDF::loadView('content/pdf', ['data' => $data]);
        return $pdf->download(date('Y-m-d') . '.pdf');
    }

    public function generateExcel()
    {
        return Excel::download(new ContentsExport, 'MasterOutlet.xlsx');
    }
}
