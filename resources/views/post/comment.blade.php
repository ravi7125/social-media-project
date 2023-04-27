
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>comments</title>
    <style>
      <style>
body{background-color:#eee}.time{font-size: 9px !important}.socials i{margin-right: 14px;font-size: 17px;color: #d2c8c8;cursor: pointer}.feed-image img{width: 100%;height: auto}
body { background-color: #eee}
.time {
    font-size: 9px !important
}
    
.like-button {
    /* background-color: #d9f634; */
    color: #fff;
    color: #bfd1e3;
    border: none;
    padding: 10px 20px;
}
.dislike-button {
    color: #fff;
    border: none;
    padding: 1px 0px;
}
.comment-button {
    /* background-color: #d9f634; */
    color: #e76161;
    border: none;
    padding: 10px 20px;
} 
.like-icon.active {
    color: blue;
}
.dislike-icon.active {
    color: red;
}
.like-icon, .dislike-icon {
    color: gray;
}
/* Like and dislike button styles */
.like-button, .dislike-button {
  display: inline-block;
  margin-right: -9px;
}

</style>
</head>
<body>
    <form method="POST" action="{{ route('post.comment', $post) }}">
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
           <div class="container mt-3 pt-4">
              @if($postcomment->count() > 0)
              @foreach($postcomment as $comment)
              
              <section style="background-color: #a7a7a7;"> 
                <div class="container">
                <div class="row d-flex justify-content-center">
                  <div class="col-md-12 col-lg-10 col-xl-8">
                      <div class="card-footer py-3 border-0" style="background-color: #b7d6f5;;">
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
  
              <a class="like-button" href="{{ url('commentlike/'.$comment->id) }}">
             
                <button type="button" class="btn btn-link">
                    <i class="fa fa-thumbs-up like-icon{{ $postcomment->likes->where('user_id', Auth::id())->where('is_like', true)->count() > 0 ? ' active' : '' }}" style="font-size:20px"></i>
                    <span class="like-count">{{ $postcomment->likes->where('is_like', true)->count() }}</span>
                </button>
            </a>
            {{-- <a class="dislike-button" href="{{ url('dislike/'.$post->id) }}">
                <button type="button" class="btn btn-link">
                    <i class="fa fa-thumbs-down dislike-icon{{ $post->likes->where('user_id', Auth::id())->where('is_dislike', true)->count() > 0 ? ' active' : '' }}" style="font-size:20px"></i>
                    <span class="dislike-count">{{ $post->likes->where('is_dislike', true)->count() }}</span>
                </button>
            </a>
            
            <a class="comment-button" href="{{ route('post.commentview', $post->id) }}">
                <button type="button" class="btn btn-link">
                    <i class="fa fa-comments-o" style="font-size:30px"></i>
                    <span class="comments-count"></span>
                </button>
                </a> --}}
               </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const likeButtons = document.querySelectorAll('.like-button');
          likeButtons.forEach(likeButton => {
              likeButton.addEventListener('click', function() {
                  const postID = this.dataset.postId;
                  const isLike = this.dataset.like === 'true';
                  const isDislike = this.dataset.dislike === 'true';
                  fetch(`/like/${postID}`, {
                      method: 'POST'
                      , type: 'POST'
                      , body: JSON.stringify({
                          is_like: isLike
                          , is_dislike: isDislike
                      })
                      , headers: {
                          'Content-Type': 'application/json'
                          , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                      }
                  }).then(response => {
                      if (response.ok) {
                          return response.json();
                      } else {
                          throw new Error('Failed to update like count');
                      }
                  }).then(data => {
                      const likeCountElement = this.querySelector('.like-count');
                      if (likeCountElement) {
                          likeCountElement.innerText = data.likeCount;
                      }
                      const likeIconElement = this.querySelector('.like-icon');
                      if (likeIconElement) {
                          if (data.isLiked) {
                              likeIconElement.classList.remove('fa-thumbs-o-up');
                              likeIconElement.classList.add('fa-thumbs-up');
                          } else {
                              likeIconElement.classList.remove('fa-thumbs-up');
                              likeIconElement.classList.add('fa-thumbs-o-up');
                          }
                      }
                      const dislikeIconElement = this.querySelector('.dislike-icon');
                      if (dislikeIconElement) {
                          if (data.isDisliked) {
                              dislikeIconElement.classList.remove('fa-thumbs-o-down');
                              dislikeIconElement.classList.add('fa-thumbs-down');
                          } else {
                              dislikeIconElement.classList.remove('fa-thumbs-down');
                              dislikeIconElement.classList.add('fa-thumbs-o-down');
                          }
                      }
                  }).catch(error => {
                      console.error(error);
                  });
              });
          });
      });
  </script>
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
