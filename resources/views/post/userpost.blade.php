@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="row">
            @foreach ($post as $post)
            <div class="col col-lg-4 border bg-light px-md-5"><img src="{{ Storage::url($post->image)}}" alt="" style="width:100%;margin-top:10%;margin-bottom:10%;height: 80%">
            <button class="btn btn-danger mb-4 "><a type="button" class="link-light text-decoration-none" href={{'delete/'.$post['id']}}>Delete</a>
            <button class="btn btn-success mb-4 mx-3 "><a type="button" class="link-light text-decoration-none"  href={{'edit/'.$post['id']}}>Edit</a>
           </div>
                @endforeach
        </div>
    </div>
</body>
</html>
    @include('layouts.footers.auth')
   
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush