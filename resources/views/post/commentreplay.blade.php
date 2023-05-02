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
    <form method="POST" action="{{ route('post.commentreplay', $post , $comment) }}">
        @csrf
<section style="background-color: #a7a7a7;"> 
<div class="container mt-5 pt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <div class="card-footer py-3 border-0" style="background-color: #b7d6f5;">
                <div class="d-flex flex-start w-100">
                    <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                        src="http://127.0.0.1:8000/argon/img/theme/team-4-800x800.jpg" alt="avatar" width="40"
                          height="40" />
                        <div class="form-outline w-100">
                            <label for="comment_replay">Comment Replay:</label>
                          <textarea class="form-control" name="comment_replay" id="comment_replay" rows="1" required
                            style="background: #fff;"></textarea>
                            @error('comment_replay')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>
                      <div class="float-end mt-6 pt-4">
                        <button type="submit" class="btn btn-primary btn-sm" style="background-color: #3c4f63;">
                            <i class="fa fa-paper-plane" style="font-size: 20px;"></i> Send
                        </button>       
                    </div>                
              </div>
         </div>
      </div>
    </div>
</div>  
</section>

</body>
</html>
    @include('layouts.footers.auth')   
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush