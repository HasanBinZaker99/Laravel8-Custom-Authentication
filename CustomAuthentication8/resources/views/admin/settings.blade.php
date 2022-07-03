<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <h4 class="text-center"> Settings </h4>
                <hr>
                <table class="table table-bordered table-info border-warning table-info border border-3 rounded-pill">
                     @php 
                        //echo "<pre>";
                        //print_r($data); // MainController e compact krle show krbe data
                    @endphp 
                    <thead>
                        <tr>
                            <th scope="col"> Name </th>
                            <th scope="col"> Email </th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ $LoggedUserInfo['name'] }}</th>
                            <td>{{ $LoggedUserInfo['email'] }}</td>
                            <td> <a href="{{ route('auth.logout') }}"> Logout </a></td>
                        </tr>
                    </tbody>
                </table>

                <ul>
                    <li><a href="/admin/dashboard">Dashboard</a></li>
                    <li><a href="/admin/profile">Profile</a></li>
                    <li><a href="/admin/settings">settings</a></li>
                    <li><a href="/admin/staff">Staff</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>