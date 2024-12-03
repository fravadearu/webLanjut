<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Details</title>
</head>

<body>
    <div class="margin-top">
        <div class="row">
            <div class="col-md-6">
                Name : {{ $data->name }}
            </div>
            <div class="col-md-6">
                City : {{ $data->nama_kota }}
            </div>
            <div class="col-md-6">
                Region : {{ $data->nama_daerah }}
            </div>
        </div>
    </div>
</body>

</html>
