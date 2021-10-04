<!DOCTYPE html>
<html>
    <head>
        <title>Guest Book | Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">

                    <div class="mt-4">
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }} 
                        </div>
                        @endif
                    </div>

                    <div class="login-form bg-light mt-4 p-4">
                        <form action="/" method="post" class="row g-3">
                            @csrf
                            <h4 class="text-center">Guest Book Administrator</h4>
                            <div class="col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" autofocus required>
                            </div>
                            <div class="col-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div> 
                            <div class="col-12"> 
                                <button type="submit" class="btn btn-dark float-end">Login</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>