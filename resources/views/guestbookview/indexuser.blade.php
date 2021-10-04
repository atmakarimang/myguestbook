@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Guest Book List</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create Post</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Organization</th>
            <th>Address</th>
            <th>Province</th>
            <th>City</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($gbData as $post)
            @php
                //Cari Key Array nya, baru tampilkan nama provinsi dan kota nya
                $hasilProv = array_search($post->provincecode, array_column($province, 'kode'));
                $hasilCity = array_search($post->citycode, array_column($city, 'kode'));
                $provinsi = $province[$hasilProv]['nama'];
                $kota = $city[$hasilCity]['nama']; 
            @endphp    
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->firstname }}</td>
            <td>{{ $post->lastname }}</td>
            <td>{{ $post->organization }}</td>
            <td>{{ $post->address }}</td>
            <td>{{ $provinsi }}</td>
            <td>{{ $kota }}</td>
            <td class="text-center">
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
 
                    <!--a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Show</a-->
 
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $gbData->links() !!}
 
@endsection