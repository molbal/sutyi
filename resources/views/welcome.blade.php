<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Sutyi</title>
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12">
            <h3>Sutyi generátor</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{route('generate')}}" method="post" target="_blank">
            @csrf
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Név</label>
                    <input name="name" type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Komment</label>
                    <textarea name="comment" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Fej típusa</label>
                    <select name="brainlet" id="" class="form-control">
                        <option value="">Véletlen</option>
                        @foreach($brainlets as $brainlet)
                            <option value="{{$brainlet}}">{{\Illuminate\Support\Str::of($brainlet)->replace('-',' ')->replace('faces/brainlet', '')->replace('.jpg', '')->trim()->ucfirst()}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <input type="submit" class="mt-3 btn btn-primary" value="Mehet">
            </div>
        </form>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>
