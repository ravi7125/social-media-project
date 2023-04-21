@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
     <!DOCTYPE html>
     <html lang="en">
     <head>
        <style>
            body{background-color:#eee}.time{font-size: 9px !important}.socials i{margin-right: 14px;font-size: 17px;color: #d2c8c8;cursor: pointer}.feed-image img{width: 100%;height: auto}
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">     
        <title>Document</title>
     </head>
     <body>
    @foreach ($posts as $post)
    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="feed p-2">
                    <div class="bg-white border mt-2">
                        <div>
                            <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle" src="{{ Storage::url($post->image) }}" width="38">
                                    <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">{{ $post->user->name }}</span><span class="text-black-50 time"></span></div>
                                </div>
                            
                                    <div class="feed-icon px-2"> <button class="btn btn-danger"><a class="text-white" type="button" href={{'delete/'.$post['id']}}>Delete</a>
                                    <div class="feed-icon px-2"> <button class="btn btn-success"><a class="text-white" type="button" href={{'edit/'.$post['id']}}>Edit</a>
                            </div>
                        </div>
                        <div class="p-2 px-3"><span>{{ $post->title }}</span></div>
                        <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="{{ Storage::url($post->image) }}"></div>
                        <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i></div>
                        <div class="p-2 px-3"><span>{{ $post->content }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
@include('layouts.footers.auth')
   
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush











{{-- new --}}
        {{-- <ul>
           
                <li>
                    <p>{{ $post->user->name }}</p>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" width="300">
                   
                </li>
            @endforeach
        </ul>
     </body>
     </html> --}}
