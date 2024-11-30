<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function selamatDatang(Request $request)
    {
        $user = 'Mahasiswa 001';
        $user1 = 'Mahasiswa 001';
        $list_content = [
            [
                'title' => 'Hari ini libur nasional',
                'content' => 'Hari ini libur nasional, karena tanggal merah'
            ],
            [
                'title' => 'Lorem ipsum dolor amet',
                'content' => 'Lorem ipsum dolor amet'
            ],
            [
                'title' => 'Informasi Mahasiswa',
                'content' => 'Silahkan check aplikasi Siska anda'
            ],
            [
                'title' => 'Webinar #44',
                'content' => 'Join melalui web zoom webinar'
            ]
        ];

        if($request->isMethod('post'))
        {
            $user = $request->input('exampleInputEmail1');
            session()->flash('user', $user);
            return redirect()->route('sampai');
        }

        
        return view('selamat', compact('user', 'list_content'));
    }

    public function sampaiJumpa(Request $request)
    {
        $user = session('user');
        return view('sampai', compact('user'));
    }
}
