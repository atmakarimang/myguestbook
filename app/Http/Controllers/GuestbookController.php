<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuestbookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('auth')->only(['store', 'update', 'edit', 'create']);
    }

    public function index()
    {
        $gbData = Guestbook::latest()->paginate(5);
        $province = Http::get('https://d.kapanlaginetwork.com/banner/test/province.json')->json();
        $city = Http::get('https://d.kapanlaginetwork.com/banner/test/city.json')->json();
        return view('guestbookview.index', compact('gbData', 'province', 'city'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $provinsi = Http::get('https://d.kapanlaginetwork.com/banner/test/province.json')->json();
        $ncity = Http::get('https://d.kapanlaginetwork.com/banner/test/city.json')->json();
        return view('guestbookview.create', [
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
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Guestbook $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('guestbookview.show', compact('post'));
    }

    public function edit(Guestbook $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.edit',$post->id) }}
        $provinsi = Http::get('https://d.kapanlaginetwork.com/banner/test/province.json')->json();
        $ncity = Http::get('https://d.kapanlaginetwork.com/banner/test/city.json')->json();
        $province = $provinsi;
        $city = $ncity;
        return view('guestbookview.edit', compact('post', 'province', 'city'));
    }

    public function update(Request $request, Guestbook $post)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $post->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Guestbook $post)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
