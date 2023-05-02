
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">     
  <title>Social_Media</title>
    <style>

body{background-color:#eee}.time{font-size: 9px !important}.socials i{margin-right: 14px;font-size: 17px;color: #d2c8c8;cursor: pointer}.feed-image img{width: 100%;height: auto}
body { background-color: #eee}.time {font-size: 9px !important}.like-button {/* background-color: #d9f634; */color: #fff;color: #bfd1e3;border: none; padding: 10px 20px;}
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
    color: rgb(60, 60, 226);
}
.dislike-icon.active {
    color: rgb(225, 76, 76);
}
.like-icon, .dislike-icon {
    color: gray;
}
/* Like and dislike button styles */
.like-button, .dislike-button {
  display: inline-block;
  margin-right: -9px;
}
.delete-comment {
  margin-left: 10px;
  font-size: 14px;
  padding: 8px 12px;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.delete-comment:hover {
  background-color: #dc3545;
  border-color: #dc3545;
}



/* CSS rules for the like and dislike icons */
.like-icon.active {
  color: blue;
}

.dislike-icon.active {
  color: gray;
}

.like-icon, .dislike-icon {
  color: gray;
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
                        <button type="submit" class="btn btn-primary btn-sm" style="background-color: #3c4f63;">
                            <i class="fa fa-paper-plane" style="font-size: 20px;"></i> Send
                        </button>       
                    </div>                
              </div>
         </div>
      </div>
    </div>
</div>
<div class="container mt-3 pt-4">
  @if(isset($postcomment) && $postcomment->count() > 0)
  @foreach($postcomment as $comment)    
    <section style="background-color: #a7a7a7;"> 
        <div class="container">
            <div class="row d-flex justify-content-center">
              <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card-footer py-3 border-0" style="background-color: #b7d6f5;">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex flex-start align-items-center">
                       <img class="rounded-circle shadow-100-strong me-3"
                       src="http://127.0.0.1:8000/argon/img/theme/team-4-800x800.jpg" alt="avatar" width="60"
                         height="60" />
                          <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">{{ $post->user->name }}</span><span class="text-black-50 time"></span></div>    
                          <div class="ml-auto">
                            @if (auth()->check() && auth()->user()->id === $comment->user_id)
                                <button class="btn btn-danger mb-4 delete-comment">
                                    <a type="button" class="link-light text-decoration-none" href="{{ url('commentdelete/'.$comment->id) }}">Delete</a>
                                </button>
                            @endif
                        </div>
                    </div>     
                <p class="mt-3 mb-4 pb-2">{{ $comment->comment }}</p>


{{-- 
   @if (auth()->check() && auth()->user()->id === $comment->user_id)       
  @foreach ($postcomment->recomment as $recomment)

    <p>{{ $recomment->recomment }} <button type="button" class="btn btn-outline-secondary"><a type="submit" style="color:red"   href={{url('recomment/'.$recomment->id) }}>Delete</a></button></p>
  @endforeach
                    @endif --}}









                <a class="like-button" href="{{ url('commentis-like/'. $post->id.'/' .$comment->id) }}">
                  <button type="button" class="btn btn-link">
                      <i class="fa fa-thumbs-up like-icon{{ $post->likes->where('user_id', Auth::id())->where('comment_like', true)->count() > 0 ? ' active' : '' }}" style="font-size:30px"></i>
                      <span class="like-count">{{ $comment->likes ? $comment->likes->where('comment_like', true)->count() : 0 }}</span>
                  </button>
              </a>
              
              <a class="dislike-button" href="{{ url('commentdis-like/'. $post->id.'/' .$comment->id) }}">
                  <button type="button" class="btn btn-link">
                      <i class="fa fa-thumbs-down dislike-icon{{ $post->likes->where('user_id', Auth::id())->where('comment_dislike', true)->count() > 0 ? ' active' : '' }}" style="font-size:30px"></i>
                      <span class="dislike-count">{{ $comment->likes ? $comment->likes->where('comment_dislike', true)->count() : 0 }}</span>
                  </button>
              </a>
              









                {{-- <a class="like-button" href="{{ url('commentis-like/'. $post->id.'/' .$comment->id) }}">
                   <button type="button" class="btn btn-link">
                       <i class="fa fa-thumbs-up like-icon{{ $post->likes->where('user_id', Auth::id())->where('like', true)->count() > 0 ? ' active' : '' }}" style="font-size:30px"></i>
                       <span class="like-count">{{ $comment->likes ? $comment->likes->where('is_like', true)->count() : 0 }}</span>
                    </button>
                </a>
                <a class="dislike-button" href="{{ url('commentdis-like/'. $post->id.'/' .$comment->id) }}">
                    <button type="button" class="btn btn-link">
                    <i class="fa fa-thumbs-down dislike-icon{{ $post->likes->where('user_id', Auth::id())->where('is_dislike', true)->count() > 0 ? ' active' : '' }}" style="font-size:30px"></i>
                    <span class="dislike-count">{{ $comment->likes ? $comment->likes->where('is_dislike', true)->count() : 0 }}</span>
                    </button>
                </a> --}}

                <a class="comment-button" href="{{ url('/post/commentview/' . $post->id . '/' . $comment->id) }}">
                  <button type="button" class="btn btn-link">
                      <i class="fa fa-comments-o" style="font-size:30px; color: #999;"></i>
                      <span class="comments-count"></span>
                  </button>
              </a>
                             
                </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
   <script>
  document.addEventListener('DOMContentLoaded', function() {
    const dislikeButtons = document.querySelectorAll('.dislike-button');
    dislikeButtons.forEach(dislikeButton => {
      dislikeButton.addEventListener('click', function() {
        const postID = this.dataset.postId;
        const isLike = this.dataset.like === 'true';
        const isDislike = this.dataset.dislike === 'true';
        fetch(`/dislike/${postID}`, {
          method: 'POST',
          type: 'POST',
          body: JSON.stringify({
            is_like: isLike,
            is_dislike: isDislike
          }),
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        }).then(response => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error('Failed to update dislike count');
          }
        }).then(data => {
          const dislikeCountElement = this.querySelector('.dislike-count');
          if (dislikeCountElement) {
            dislikeCountElement.innerText = data.dislikeCount;
          }
          const likeIconElement = this.querySelector('.like-icon');
          if (likeIconElement) {
            if (data.isLiked) {
              likeIconElement.classList.add('active');
            } else {
              likeIconElement.classList.remove('active');
            }
          }
          const dislikeIconElement = this.querySelector('.dislike-icon');
          if (dislikeIconElement) {
            if (data.isDisliked) {
              dislikeIconElement.classList.add('active');
            } else {
              dislikeIconElement.classList.remove('active');
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
        @endif
  @include('layouts.footers.auth')
  @endsection
  @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
  @endpush
</body>
</html>














