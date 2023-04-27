$('.like-button').click(function (e) {
    e.preventDefault();

    var $this = $(this);
    var commentId = $this.data('comment-id');
    var isLike = $this.hasClass('active') ? 0 : 1;

    $.ajax({
        type: 'POST',
        url: '/like/toggle',
        data: {
            comment_id: commentId,
            is_like: isLike,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        success: function (response) {
            $this.find('.like-count').text(response.like_count);

            if (isLike) {
                $this.find('.like-icon').addClass('active');
            } else {
                $this.find('.like-icon').removeClass('active');
            }
        },
    });
});
