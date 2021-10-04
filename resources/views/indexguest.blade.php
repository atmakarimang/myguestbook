@extends('template')
 
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Guest Book Form</h2>
        </div>
    </div>
</div>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
 
<form action="/addguest" method="POST">
    @csrf 
     <div class="row pb-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
                <strong>First Name:</strong>
                <input type="text" name="firstname" class="form-control" placeholder="Your First Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="lastname" class="form-control" placeholder="Your Last Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Organization:</strong>
                <input type="text" name="organization" class="form-control" placeholder="Your Organization, You Know, Like MUI">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea class="form-control" style="height:150px" name="address" placeholder="Address"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Province:</strong>
                <select class="form-select" aria-label="Default select example" name="provincecode" onchange="UpdateCity()" id="provcode"> 
                    <option selected>Province</option>
                    @foreach($province as $listprovinsi)
                        {{ $listprovinsi['kode'] }}
                        <option value="{{ $listprovinsi['kode'] }}">{{ $listprovinsi['nama'] }}</option>
                    @endforeach
                </select> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                <select class="form-select" aria-label="Default select example" name="citycode" id="citycode">
                    <option selected>City</option>
                    @foreach($city as $listcity)
                        {{ $listcity['kode'] }}
                        <option value="{{ $listcity['kode'] }}">{{ $listcity['nama'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>

<script>

    function UpdateCity(){
        let prov = $("#provcode").val();
        $.ajax({
            url:"{{url('')}}/listcity/"+prov,
            success:function(res){
                console.log(res);
            }
        })
    }        

</script>

@endsection