<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuestController extends Controller
{
    public function create()
    {
        $provinsi = Http::get('https://d.kapanlaginetwork.com/banner/test/province.json')->json();
        $ncity = Http::get('https://d.kapanlaginetwork.com/banner/test/city.json')->json();

        return view('indexguest', [
            'province' => $provinsi,
            'city' => $ncity
        ]);
    }

    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Guestbook::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('guestbook.index')
            ->with('success', 'Guest adding successfully.');
    }
}
