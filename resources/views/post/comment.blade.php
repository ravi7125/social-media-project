
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('post.comment', $post) }}">
        @csrf
 <section style="background-color: #dedddd;"> 
<div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                <div class="d-flex flex-start w-100">
                    <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                        src="http://127.0.0.1:8000/argon/img/theme/team-4-800x800.jpg" alt="avatar" width="40"
                          height="40" />
                        <div class="form-outline w-100">
                            <label for="comment">Comment:</label>
                          <textarea class="form-control" name="comment" id="comment" rows="1" required
                            style="background: #fff;"></textarea>
                            @error('comment')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>
                      <div class="float-end mt-6 pt-4">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>       
                    </div>
              </div>
         </div>
      </div>
    </div>
</div>

              @if($postcomment->count() > 0)
              @foreach($postcomment as $comment)
              <section style="background-color: #dedddd;"> 
              <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center">
                  <div class="col-md-12 col-lg-10 col-xl-8">
                      <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-100-strong me-3"
                src="http://127.0.0.1:8000/argon/img/theme/team-4-800x800.jpg" alt="avatar" width="60"
                  height="60" />
                <div>
                 
                  <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">{{ $post->user->name }}</span><span class="text-black-50 time"></span></div>
                 
                </div>
              </div>
              
              <p class="mt-3 mb-4 pb-2">{{ $comment->comment }}</p>
  
              <div class="small d-flex justify-content-start">
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="far fa-thumbs-up me-2"></i>
                  <p class="mb-0">Like</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="far fa-comment-dots me-2"></i>
                  <p class="mb-0">Comment</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="fas fa-share me-2"></i>
                  <p class="mb-0">Share</p>
                </a>
              </div>
            </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  @endforeach
        @else
            <p>No comments yet.</p>
        @endif



  @include('layouts.footers.auth')
  @endsection
  @push('js')
      <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
      <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
  @endpush
</body>
</html>














  {{-- <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <form method="POST" action="{{ route('post.comment', $post) }}">
        @csrf
        <div>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" rows="5" required></textarea>
            @error('comment')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
       
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    
  </body>
  </html> --}}
