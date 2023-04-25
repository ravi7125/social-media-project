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
                                    {{-- <div class="feed-icon px-2"> <button class="btn btn-danger"><a class="text-white" type="button" href={{'delete/'.$post['id']}}>Delete</a>
                                    <div class="feed-icon px-2"> <button class="btn btn-success"><a class="text-white" type="button" href={{'edit/'.$post['id']}}>Edit</a>
                            </div> --}}
                        </div>
                        <div class="p-2 px-3"><span>{{ $post->title }}</span></div>
                        <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="{{ Storage::url($post->image) }}"></div>
                       
                        <div >
                            <p id="likesCounts"> {{$post->post_like->count() ?: 0 }} </p>
                          </div>                 
                          <form action="{{route('likePost')}}" method="POST" class="like" id="likePostForm">
                                                  @csrf                    
                                              <div class="post-options">
                                                  <div class="post-option">
                                                      {{-- @if($post->likes && $post->likes->user_id == auth()->user->id) --}}
                                                      {{-- <span class="material-icons" style="margin-top: -15px;"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 329.523 291.435"><path d="M320.059 159.554c16.697-16.622 11.538-50.242-17.372-50.242l-76.067.055c2.876-16.12 7.061-42.817 6.891-45.342-1.59-23.875-16.832-52.937-17.475-54.132-2.77-5.166-16.793-12.182-30.9-9.166-18.252 3.903-20.115 15.529-20.038 18.736 0 0 .8 31.829.876 40.309-8.712 19.155-38.781 69.482-47.911 73.36a13.894 13.894 0 0 0-7.217-2.025H14.725C6.592 131.107 0 137.698 0 145.83l.012 132.824c.569 7.166 6.648 12.781 13.842 12.781h86.296c7.652 0 13.88-6.226 13.88-13.877v-4.407s3.21-.22 4.658.698c5.55 3.525 12.417 7.961 21.358 7.961h128.832c48.137 0 42.972-42.74 38.583-48.586 8.132-8.867 13.166-24.48 6.296-36.832 5.319-5.582 14.613-20.941 6.302-36.838z" fill="#37393d"/><path d="M300.508 123.249H209.68c3.506-13.917 9.975-58.275 9.975-58.275-1.467-21.533-15.869-48.553-15.869-48.553-17.117-7.204-24.811 2.678-24.811 2.678s.889 34.219.889 42.125c0 7.907-39.113 71.123-48.669 79.266-5.064 4.317-14.156 10.25-21.56 14.86v102.023l5.932.006c6.829 0 15.219 10.551 24.48 10.551l131.024-.057c26.333 0 30.526-29.662 13.148-32.51l.775-3.275c16.662-1.793 26.797-28.141 5.527-33.546l.781-3.286c15.902-1.674 27.714-27.246 5.521-33.552l.781-3.281c20.892-3.297 25.15-35.17 2.904-35.174z" fill="#0000FF"/><path d="M296.824 161.704l.781-3.281c20.891-3.296 25.149-35.169 2.903-35.174h-43.877c22.251.004 17.992 31.878-2.899 35.174l-.337 1.948c22.194 6.305 9.934 33.211-5.968 34.885l-.337 1.954c21.273 5.404 10.689 33.085-5.971 34.878l-.329 1.941c17.381 2.847 12.737 33.844-13.597 33.844l-87.411.036c.089.003.178.021.264.021l131.024-.057c26.333 0 30.526-29.662 13.148-32.51l.775-3.275c16.662-1.793 26.797-28.141 5.527-33.546l.781-3.286c15.905-1.674 27.716-27.247 5.523-33.552z" fill="#0000FF"/><path fill="#0000FF" d="M13.854 144.989h86.497v132.563H13.854z"/><path d="M13.854 144.989v132.563h86.497V144.989H13.854zM94.78 271.99H19.421V162.125L94.78 162v109.99z" fill="#0000FF"/><path d="M122.701 260.007V146.846c-.192.133-12.115 7.913-13.066 8.503v102.023l5.932.006c2.221 0 4.604 1.125 7.134 2.629z" opacity=".5" fill="#0000FF"/><path d="M191.609 13.794h-.006c.062.248 10.69 39.638 10.69 45.301 0 5.667-32.253 53.75-27.936 59.836 5.882 8.286 35.322 4.317 35.322 4.317 3.506-13.917 9.975-58.275 9.975-58.275-1.467-21.533-15.869-48.553-15.869-48.553-.573-.242-5.495-2.63-12.176-2.626z" fill="#0000FF"/></svg></span> --}}
                                                      {{-- @else --}}
                                                      <span class="material-icons" style="margin-top: -15px;"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 329.523 291.435"><path d="M320.059 159.554c16.697-16.622 11.538-50.242-17.372-50.242l-76.067.055c2.876-16.12 7.061-42.817 6.891-45.342-1.59-23.875-16.832-52.937-17.475-54.132-2.77-5.166-16.793-12.182-30.9-9.166-18.252 3.903-20.115 15.529-20.038 18.736 0 0 .8 31.829.876 40.309-8.712 19.155-38.781 69.482-47.911 73.36a13.894 13.894 0 0 0-7.217-2.025H14.725C6.592 131.107 0 137.698 0 145.83l.012 132.824c.569 7.166 6.648 12.781 13.842 12.781h86.296c7.652 0 13.88-6.226 13.88-13.877v-4.407s3.21-.22 4.658.698c5.55 3.525 12.417 7.961 21.358 7.961h128.832c48.137 0 42.972-42.74 38.583-48.586 8.132-8.867 13.166-24.48 6.296-36.832 5.319-5.582 14.613-20.941 6.302-36.838z" fill="#37393d"/><path d="M300.508 123.249H209.68c3.506-13.917 9.975-58.275 9.975-58.275-1.467-21.533-15.869-48.553-15.869-48.553-17.117-7.204-24.811 2.678-24.811 2.678s.889 34.219.889 42.125c0 7.907-39.113 71.123-48.669 79.266-5.064 4.317-14.156 10.25-21.56 14.86v102.023l5.932.006c6.829 0 15.219 10.551 24.48 10.551l131.024-.057c26.333 0 30.526-29.662 13.148-32.51l.775-3.275c16.662-1.793 26.797-28.141 5.527-33.546l.781-3.286c15.902-1.674 27.714-27.246 5.521-33.552l.781-3.281c20.892-3.297 25.15-35.17 2.904-35.174z" fill="#fff"/><path d="M296.824 161.704l.781-3.281c20.891-3.296 25.149-35.169 2.903-35.174h-43.877c22.251.004 17.992 31.878-2.899 35.174l-.337 1.948c22.194 6.305 9.934 33.211-5.968 34.885l-.337 1.954c21.273 5.404 10.689 33.085-5.971 34.878l-.329 1.941c17.381 2.847 12.737 33.844-13.597 33.844l-87.411.036c.089.003.178.021.264.021l131.024-.057c26.333 0 30.526-29.662 13.148-32.51l.775-3.275c16.662-1.793 26.797-28.141 5.527-33.546l.781-3.286c15.905-1.674 27.716-27.247 5.523-33.552z" fill="#eaebf5"/><path fill="#7082ad" d="M13.854 144.989h86.497v132.563H13.854z"/><path d="M13.854 144.989v132.563h86.497V144.989H13.854zM94.78 271.99H19.421V162.125L94.78 162v109.99z" fill="#7c8cb0"/><path d="M122.701 260.007V146.846c-.192.133-12.115 7.913-13.066 8.503v102.023l5.932.006c2.221 0 4.604 1.125 7.134 2.629z" opacity=".5" fill="#d0d1d0"/><path d="M191.609 13.794h-.006c.062.248 10.69 39.638 10.69 45.301 0 5.667-32.253 53.75-27.936 59.836 5.882 8.286 35.322 4.317 35.322 4.317 3.506-13.917 9.975-58.275 9.975-58.275-1.467-21.533-15.869-48.553-15.869-48.553-.573-.242-5.495-2.63-12.176-2.626z" fill="#eaebf5"/></svg></span>
                                                      {{-- @endif --}}
                                                      <input type="hidden" class="post_like" id="post_like" name="post_like" value="{{$post->id}}"/>
                                                      <button id="reloader" type="submit" style="border: none; background-color:transparent; color:#737373;"><p>post_like</p></button>
                                                      {{-- <button type="submit" style="border: none; background-color:transparent;"><p class="{{$post->isLikedBy(current_user()) ? 'text-primary'}}">Like</p></button> --}}
                                                  </div>
                                                  <div class="post-option">
                                                      <span class="material-icons"><i data-visualcompletion="css-img" class="hu5pjgll m6k467ps" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/zz_vrFBDgEM.png&quot;); background-position: 0px -259px; background-size: auto; width: 18px; height: 18px; background-repeat: no-repeat; display: inline-block;"></i></i></span>
                                                      <p class="">Comment</p>
                                                  </div>
                                                  <div class="post-option">
                                                      <span class="material-icons"><i data-visualcompletion="css-img" class="hu5pjgll m6k467ps" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/zz_vrFBDgEM.png&quot;); background-position: 0px -316px; background-size: auto; width: 18px; height: 18px; background-repeat: no-repeat; display: inline-block;"></i></span>
                                                      <p>Share</p>
                                                  </div>
                                              </div>
                                              </form>
                                            <div class="p-2 px-3"><span>{{ $post->content }}</span></div>
                                        </div>
                                    </div>
                                 </div>
                             </div>
                        </div>
                        <script>
                            $(".like").on('submit',function(e){
                            e.preventDefault();
                            var post_like = $('.post_like').val();
                            document.getElementById('likesCounts').innerHTML = "";
                            $.ajax({
                                    type:'POST',
                                    url:"{{ route('likePost') }}",
                                    data:{
                                        "_token": "{{ csrf_token() }}",
                                        post_like: post_like,
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('#likesCounts').html(data.post_like);
                                    }
                                });
                            });
                        </script>
@endforeach
@include('layouts.footers.auth')
   
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush














