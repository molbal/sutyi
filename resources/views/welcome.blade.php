<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{asset('image-picker.css')}}" rel="stylesheet">

    <title>Brainlet generátor</title>
</head>
<body>

<form action="{{route('brainlet.make')}}" method="post" target="_blank">
<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-sm-12 mb-3">
            <h3>Brainlet generátor</h3>
        </div>
    </div>
    <div class="row">
        <div class="card card-body shadow-sm">
                @csrf
                <div class="col-sm-12">
                    <div class="form-group mt-3">
                        <label for="">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group mt-3">
                        <label for="">Comment</label>
                        <textarea name="comment" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group mt-3">
                        <label for="">Brainlet</label>
                        <select name="brainlet" id="brainlet" class="form-control ">
                            @foreach($brainlets as $brainlet)
                                <option data-img-src="{{asset($brainlet)}}"
                                        value="{{$brainlet}}">{{\Illuminate\Support\Str::of($brainlet)->replace('-',' ')->replace('faces/brainlet', '')->replace('.jpg', '')->trim()->ucfirst()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Generate">
        </div>
    </div>
</div>
</form>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('image-picker.min.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>--}}
<script>
    $(function () {
        $("select#brainlet").imagepicker()
    });
</script>
<script>
</script>
</body>
</html>
