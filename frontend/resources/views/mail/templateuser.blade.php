<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Send BGB</title>
</head>
<body>
    <h3>Hallo Berikut E-mail dan Password</h3>
    <p>Dear Bapak/Ibu,</p>
    <p>Selamat bergabung dalam Program BGB Citanusa Group!</p>
    <br>
    <p>Berikut informasi terkait akun anda </p>
    <p>Link share BGB :  {{ $data['link'] }}</p>
    <p>ID : {{ $data['email'] }}</p>
    <p>Password : {{ $data['password'] }}</p>
    <br>
    <p>Anda dapat mengakses akun tersebut pada website www.programbgb.com
        Happy Selling!</p>
    <br>
    <p>Terima Kasih,</p>
    <p>Customer Care BGB</p>
</body>
</html>