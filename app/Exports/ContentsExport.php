<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ContentsExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list = DB::table('content')
        ->join('kategori','content.kategori_id','kategori.id')
        ->get();
        $contents = [];
        foreach ($list as $item) {
            $contents[] = ['title' => $item->title, 'kategori' => $item->nama];
        }
        return collect($contents);
    }

    public function headings(): array
    {
        return ['Judul','Nama Kategori'];
    }

    public function columnWidths(): array{
        return ['A' => 70];
    }
}