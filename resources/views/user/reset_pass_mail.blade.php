
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="text-center">
    <h1>Matching Site</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <p>You are receiving this email because we received a password reset request for your account.</p>
            <p><a href="{{route('reset_pass',['id'=> $id, 'token' => $token])}}"><button class="btn btn-danger">Reset Password</button></a></p>
            <p>If you did not request a password reset, no further action is required.</p>
        </div>

    </div>
</div>

</body>
</html>

