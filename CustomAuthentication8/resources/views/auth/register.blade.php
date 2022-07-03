<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
</head>
<body>

<div class="container ">
    <div class="row align-items-center" style="min-height: 80vh">
        <div class="col-md-12">
            <div class="col-md-4  mx-auto   ">
            <h3> Login| Custom Auth </h3>
            <form action="{{ route('auth.save')}}" method="post">
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                @endif
            @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" placeholder="Enter your name" class="form-control" name="name" id="name" value=" {{old('name')}} ">
                    <span class="text-danger"> 
                        @error('name')
                        {{ $message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" placeholder="Enter your email address" class="form-control" name="email" id="exampleInputEmail1" value="{{old('email')}}">
                    <span class="text-danger">
                    @error('email') 
                     {{$message}}
                    @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" class="form-control" id="exampleInputPassword1">
                    <span class="text-danger">
                        @error('password')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
              <br> 
              <a href="{{route('auth.login')}}"> I already have an account, sign in </a>
            </form>

            </div>
        </div>
    </div>
</div>
    
</body>
</html> 



