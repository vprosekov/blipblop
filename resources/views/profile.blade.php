@extends('layout.layout')

@section('content')

    <div style="width: 90%;margin: 0px auto;display: block;margin-bottom: 20px;">
        <h1>{{ $user->name }}</h1>
    </div>

    @if (Auth::user()->id == $user->id)
        @include('layout.publishpost')
    @endif

    <div id="posts">
    </div>

    <center>
        <a href="" id="loadmoreposts">
            <div class="loadmorefeed">
                <i class="fa fa-ellipsis-h"></i>
            </div>
        </a>
    </center>
@stop

@section('script')
    <script>
        $().ready(function() {
            $.ajax({
                type: 'GET',
                url: '{{ env('APP_URL') }}api/user/{{ $user->id }}/posts?offset=0&limit=10',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var posts = data.data.posts;
                    var html = '';
                    for (var i = 0; i < posts.length; i++) {
                        html += '<div class="row border-radius">';
                        html += '<div class="feed">';
                        html += '<div class="feed_title">';
                        html += '<a href="{{ env('APP_URL') }}user/' + posts[i].author.id +
                            '"><img src="{{ env('APP_URL') }}' + posts[i].author.profile_photo.file_path
                            .substring(1) + '" alt="" /></a>';
                        html += '<span><b>' + posts[i].author.name + '</b><br>';
                        html += '<p>' + posts[i].created_at + '</p>';
                        html += '</span>';
                        html += '</div>';
                        html += '<div class="feed_content">';
                        html += '<div class="feed_content_image">';
                        if (posts[i].media) {
                            // make posts[i].media.file_path without leading slash in the beginning
                            html +=
                                '<a href="feed.html"><img style="height:250px" src="{{ env('APP_URL') }}' +
                                posts[i]
                                .media.file_path.substring(1) + '" alt="" /></a>';
                        }
                        html += '<p>' + posts[i].content + '</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="feed_footer">';
                        html += '<ul class="feed_footer_left">';
                        html += '<li post_id="' + posts[i].post_id +
                            '" id="likebtn' + posts[i].post_id + '" class="hover-orange ' + (posts[i][
                                "liked_by_auth_user"
                            ] ? 'selected-orange' : '') + '"><i class="fa fa-heart"></i> ' + posts[i]
                            .likes + '</li>';
                        html += '</ul>';
                        html += '<ul class="feed_footer_right">';
                        html +=
                            '<li class="hover-orange"><i class="fa fa-comments-o"></i> 14 comments</li>';
                        html += '</a>';
                        html += '</li>';
                        html += '</ul>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }
                    $("#posts").html(html);
                },
                error: function(data) {
                    alert('Error');
                }
            });
            $('#posts').on('click', 'li[id^="likebtn"]', function(e) {
                e.preventDefault();
                var post_id = $(this).attr('post_id');
                var likebtn = $(this);
                var method = likebtn.hasClass('selected-orange') ? 'DELETE' : 'POST';
                var liked = likebtn.hasClass('selected-orange') ? false : true;
                $.ajax({
                    type: method,
                    url: '{{ env('APP_URL') }}api/posts/' + post_id + '/like',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (liked) {
                            likebtn.addClass('selected-orange');
                        } else {
                            likebtn.removeClass('selected-orange');
                        }
                        likebtn.html('<i class="fa fa-heart"></i> ' + data.data.post.likes);
                    },
                    error: function(data) {
                        alert('Error');
                    }
                });
            });

        });
        $("#loadmoreposts").click(function(e) {
            e.preventDefault();
            let offset = $("#posts").children().length;
            // ajax
            $.ajax({
                type: 'GET',
                url: '{{ env('APP_URL') }}api/user/{{ $user->id }}/posts?offset=' + offset +
                    '&limit=10',
                dataType: 'json',
                success: function(data) {
                    if (data.data.posts.length == 0) {
                        alert('No more posts');
                        return false;
                    }
                    console.log(data);
                    var posts = data.data.posts;
                    var html = $('#posts').html();
                    for (var i = 0; i < posts.length; i++) {
                        html += '<div class="row border-radius">';
                        html += '<div class="feed">';
                        html += '<div class="feed_title">';
                        html += '<a href="{{ env('APP_URL') }}user/' + posts[i].author.id +
                            '"><img src="{{ env('APP_URL') }}' + posts[i].author.profile_photo
                            .file_path
                            .substring(1) + '" alt="" /></a>';
                        html += '<span><b>' + posts[i].author.name + '</b><br>';
                        html += '<p>' + posts[i].created_at + '</p>';
                        html += '</span>';
                        html += '</div>';
                        html += '<div class="feed_content">';
                        html += '<div class="feed_content_image">';
                        if (posts[i].media) {
                            // make posts[i].media.file_path without leading slash in the beginning
                            html +=
                                '<a href="feed.html"><img style="height:250px" src="{{ env('APP_URL') }}' +
                                posts[i]
                                .media.file_path.substring(1) + '" alt="" /></a>';
                        }
                        html += '<p>' + posts[i].content + '</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="feed_footer">';
                        html += '<ul class="feed_footer_left">';
                        html += '<li post_id="' + posts[i].post_id +
                            '" id="likebtn' + posts[i].post_id + '" class="hover-orange ' + (posts[i][
                                "liked_by_auth_user"
                            ] ? 'selected-orange' : '') + '"><i class="fa fa-heart"></i> ' + posts[i]
                            .likes + '</li>';
                        html += '</ul>';
                        html += '<ul class="feed_footer_right">';
                        html +=
                            '<li class="hover-orange"><i class="fa fa-comments-o"></i> 14 comments</li>';
                        html += '</a>';
                        html += '</li>';
                        html += '</ul>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }
                    $("#posts").html(html);
                },
                error: function(data) {
                    alert('Error');
                }
            });

        });
    </script>
@stop
