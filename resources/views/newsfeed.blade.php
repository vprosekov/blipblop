@extends('layout.layout')

@section('content')
    @include('layout.publishpost')


    <div class="row border-radius">
        <div class="feed">
            <div class="feed_title">
                <img src="images/user-7.jpg" alt="" />
                <span><b>Marina Valentine</b> shared a <a href="feed.html">photo</a><br>
                    <p>March 2 at 6:05pm</p>
                </span>
            </div>
            <div class="feed_content">
                <div class="feed_content_image">
                    <a href="feed.html"><img src="images/photo-1.jpg" alt="" /></a>
                </div>
            </div>
            <div class="feed_footer">
                <ul class="feed_footer_left">
                    <li class="hover-orange selected-orange"><i class="fa fa-heart"></i> 22k</li>
                    <li><span><b>Jimmy, Andrea</b> and 47 more liked this</span></li>
                </ul>
                <ul class="feed_footer_right">
                    <li>
                    <li class="hover-orange selected-orange"><i class="fa fa-share"></i> 7k</li>
                    <a href="feed.html" style="color:#515365;">
                        <li class="hover-orange"><i class="fa fa-comments-o"></i> 74 comments</li>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row border-radius">
        <div class="feed">
            <div class="feed_title">
                <img src="images/user-6.jpg" alt="" />
                <span><b>Valentine Krashe</b> shared a <a href="feed.html">photo</a><br>
                    <p>March 1 at 3:53pm</p>
                </span>
            </div>
            <div class="feed_content">
                <div class="feed_content_image">
                    <a href="feed.html"><img src="images/photo-2.jpg" alt="" /></a>
                </div>
            </div>
            <div class="feed_footer">
                <ul class="feed_footer_left">
                    <li class="hover-orange selected-orange"><i class="fa fa-heart"></i> 159</li>
                    <li><span><b>Jimmy, Andrea</b> and 157 more liked this</span></li>
                </ul>
                <ul class="feed_footer_right">
                    <li>
                    <li class="hover-orange selected-orange"><i class="fa fa-share"></i> 7k</li>
                    <a href="feed.html" style="color:#515365;">
                        <li class="hover-orange"><i class="fa fa-comments-o"></i> 44 comments</li>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row border-radius">
        <div class="feed">
            <div class="feed_title">
                <img src="{{ Auth::user()->profile_photo_id ? Auth::user()->profile_photo_id : env('APP_URL') . 'images/no-profile-pic.jpeg' }}"
                    alt="" />
                <span><b>{{ Auth::user()->name }}</b> shared a <a href="feed.html">video</a><br>
                    <p>March 1 at 3:53pm</p>
                </span>
            </div>
            <div class="feed_content">
                <div class="feed_content_image">
                    <iframe src="https://www.youtube.com/embed/jR8L9UyExH4" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="feed_footer">
                <ul class="feed_footer_left">
                    <li class="hover-orange selected-orange"><i class="fa fa-heart"></i> 1k</li>
                    <li><span><b>Jimmy, Andrea</b> and 47 more liked this</span></li>
                </ul>
                <ul class="feed_footer_right">
                    <li>
                    <li class="hover-orange selected-orange"><i class="fa fa-share"></i> 177</li>
                    <a href="feed.html" style="color:#515365;">
                        <li class="hover-orange"><i class="fa fa-comments-o"></i> 12 comments</li>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row border-radius">
        <div class="feed">
            <div class="feed_title">
                <img src="images/user-6.jpg" alt="" />
                <span><b>Valentine Krashe</b> shared a <a href="feed.html">photo</a><br>
                    <p>March 1 at 3:53pm</p>
                </span>
            </div>
            <div class="feed_content">
                <div class="feed_content_image">
                    <a href="feed.html"><img src="images/photo-2.jpg" alt="" /></a>
                </div>
            </div>
            <div class="feed_footer">
                <ul class="feed_footer_left">
                    <li class="hover-orange selected-orange"><i class="fa fa-heart"></i> 159</li>
                    <li><span><b>Jimmy, Andrea</b> and 157 more liked this</span></li>
                </ul>
                <ul class="feed_footer_right">
                    <li>
                    <li class="hover-orange selected-orange"><i class="fa fa-share"></i> 7k</li>
                    <a href="feed.html" style="color:#515365;">
                        <li class="hover-orange"><i class="fa fa-comments-o"></i> 14 comments</li>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row border-radius">
        <div class="feed">
            <div class="feed_title">
                <img src="images/user-6.jpg" alt="" />
                <span><b>Valentine Krashe</b>
                    <p>March 1 at 3:53pm</p>
                </span>
            </div>
            <div class="feed_content">
                <div class="feed_content_image">
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt
                        mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                        voluptatem
                        accusantium doloremque.</p>
                </div>
            </div>
            <div class="feed_footer">
                <ul class="feed_footer_left">
                    <li class="hover-orange selected-orange"><i class="fa fa-heart"></i> 159</li>
                    <li><span><b>Jimmy, Andrea</b> and 157 more liked this</span></li>
                </ul>
                <ul class="feed_footer_right">
                    <li>
                    <li class="hover-orange selected-orange"><i class="fa fa-share"></i> 7k</li>
                    <a href="feed.html" style="color:#515365;">
                        <li class="hover-orange"><i class="fa fa-comments-o"></i> 54 comments</li>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <center>
        <a href="">
            <div class="loadmorefeed">
                <i class="fa fa-ellipsis-h"></i>
            </div>
        </a>
    </center>

@stop

@section('script')
    <script>
        $("#publish-post-btn").click(function(e) {
            e.preventDefault();
            // validate
            var post = $("#post-content").val();
            if (post == "") {
                alert("Please write something");
                return false;
            }
            // ajax
            $.ajax({
                type: 'POST',
                url: '/api/posts',
                data: {
                    content: post
                },
                success: function(data) {
                    alert('Post added');
                    window.location.reload();

                },
                error: function(data) {
                    alert('Error');
                }
            });

        });
    </script>
@stop
