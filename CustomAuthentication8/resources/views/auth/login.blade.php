<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
</head>
<body>

<div class="container ">
    <div class="row align-items-center" style="min-height: 80vh">
        <div class="col-md-12">
            <div class="col-md-4  mx-auto   ">
            <h3> Login| Custom Auth </h3>
            <form action="{{ route('auth.check') }}" method="post">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" placeholder="Enter your email address" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <a href="{{route('forgot.password.form')}}" class="float-right">Forget Password</a>
                <button type="submit" class="btn btn-block btn-primary">Sign In</button>
              <br> 
              <a href="{{ route('auth.register')}}"> I don't have an account, create new </a>
            </form>

            </div>
        </div>
    </div>
</div>
    
</body>
</html> 



