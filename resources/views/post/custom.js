$(document).ready(function() {
    $('.like-btn').click(function() {
        $.ajax({
            url: '{{ route("post.like", $post->id) }}',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status === 'success') {
                    // update the like count
                    let likesCount = parseInt($('.likes-count').text());
                    $('.likes-count').text(likesCount + 1);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
});
