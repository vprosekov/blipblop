<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?=env("APP_NAME")?></title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Icons FontAwesome 4.7.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css" />



</head>
<body>
    <div class="navbar">
        <div class="navbar_menuicon" id="navicon">
            <i class="fa fa-navicon"></i>
        </div>
        <div class="navbar_logo">
            <img src="images/logo.png" alt="" />
        </div>
        <div class="navbar_page">
            <span>{{ Route::currentRouteName() }}</span>
        </div>
        <div class="navbar_search">
            <form method="" action="/">
                <input type="text" placeholder="Search people.." />
                <button><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="navbar_icons">
            <ul>
                <li id="friendsmodal"><i class="fa fa-user-o"></i><span id="notification">5</span></li>
                <li id="messagesmodal"><i class="fa fa-comments-o"></i><span id="notification">2</span></li>
                <a href="" style="color:white"><li><i class="fa fa-globe"></i></li></a>
            </ul>
        </div>
        <div class="navbar_user" id="profilemodal" style="cursor:pointer">
            <img src="images/user.jpg" alt="" />
            <span id="navbar_user_top">Jonh Hamstrong<br><p>User</p></span><i class="fa fa-angle-down"></i>
        </div>
    </div>

    <div class="all">

        <div class="rowfixed"></div>
        <div class="left_row">
            <div class="left_row_profile">
                <img id="portada" src="images/portada.jpg" />
                <div class="left_row_profile">
                    <img id="profile_pic" src="images/user.jpg" />
                    <span>Jonh Hamstrong<br><p>150k followers / 50 follow</p></span>
                </div>
            </div>
            <div class="rowmenu">
                <ul>
                    <li><a href="index.html" id="rowmenu-selected"><i class="fa fa-globe"></i>Newsfeed</a></li>
                    <li><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a href="friends.html"><i class="fa fa-users"></i>Friends</a></li>
                    <li class="primarymenu"><i class="fa fa-compass"></i>Explore</li>
                    <ul>
                        <li style="border:none"><a href="#A">Activity</a></li>
                        <li style="border:none"><a href="#">Friends</a></li>
                        <li style="border:none"><a href="#">Groups</a></li>
                        <li style="border:none"><a href="#">Pages</a></li>
                        <li style="border:none"><a href="#">Saves</a></li>
                    </ul>
                    <li class="primarymenu"><i class="fa fa-user"></i>Rapid Access</li>
                    <ul>
                        <li style="border:none"><a href="#">Your-Page.html</a></li>
                        <li style="border:none"><a href="#">Your-Group.html</a></li>
                    </ul>
                </ul>
            </div>
        </div>



        <div class="right_row">
            <div class="row">
                <div class="publish">
                    <div class="row_title">
                        <span><i class="fa fa-newspaper-o" aria-hidden="true"></i> Status</span>

                    </div>
                    <form method="" action="/">
                        <div class="publish_textarea">
                            <img class="border-radius-image" src="images/user.jpg" alt="" />
                            <textarea type="text" placeholder="¿Whats up, Jonh?" style="resize: none;"></textarea>
                        </div>
                        <div class="publish_icons">
                            <ul>
                                <li><i class="fa fa-camera"></i></li>
                                <li><i class="fa fa-video-camera"></i></li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i></li>
                            </ul>
                            <button>Publish</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row border-radius">
                <div class="feed">
                    <div class="feed_title">
                        <img src="images/user-7.jpg" alt="" />
                        <span><b>Marina Valentine</b> shared a <a href="feed.html">photo</a><br><p>March 2 at 6:05pm</p></span>
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
                                <a href="feed.html" style="color:#515365;"><li class="hover-orange"><i class="fa fa-comments-o"></i> 74 comments</li></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row border-radius">
                <div class="feed">
                    <div class="feed_title">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Valentine Krashe</b> shared a <a href="feed.html">photo</a><br><p>March 1 at 3:53pm</p></span>
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
                                <a href="feed.html" style="color:#515365;"><li class="hover-orange"><i class="fa fa-comments-o"></i> 44 comments</li></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row border-radius">
                <div class="feed">
                    <div class="feed_title">
                        <img src="images/user.jpg" alt="" />
                        <span><b>Jonh Hamstrong</b> shared a <a href="feed.html">video</a><br><p>March 1 at 3:53pm</p></span>
                    </div>
                    <div class="feed_content">
                        <div class="feed_content_image">
                            <iframe src="https://www.youtube.com/embed/jR8L9UyExH4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                <a href="feed.html" style="color:#515365;"><li class="hover-orange"><i class="fa fa-comments-o"></i> 12 comments</li></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            

            <div class="row border-radius">
                <div class="feed">
                    <div class="feed_title">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Valentine Krashe</b> shared a <a href="feed.html">photo</a><br><p>March 1 at 3:53pm</p></span>
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
                                <a href="feed.html" style="color:#515365;"><li class="hover-orange"><i class="fa fa-comments-o"></i> 14 comments</li></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            

            <div class="row border-radius">
                <div class="feed">
                    <div class="feed_title">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Valentine Krashe</b><p>March 1 at 3:53pm</p></span>
                    </div>
                    <div class="feed_content">
                        <div class="feed_content_image">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
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
                                <a href="feed.html" style="color:#515365;"><li class="hover-orange"><i class="fa fa-comments-o"></i> 54 comments</li></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <center>
                <a href=""><div class="loadmorefeed">
                    <i class="fa fa-ellipsis-h"></i>
                </div></a>
            </center>
        </div>

        <div class="suggestions_row">
            <div class="row shadow">
                <div class="row_title">
                    <span>Friend Suggestions</span>
                    <a href="friends.html">see more..</a>
                </div>
                <div class="row_contain">
                    <img src="images/user-7.jpg" alt="" />
                    <span><b>Francine Smith</b><br>8 Friends in Common</span>
                    <button>+</button>
                </div>
                <div class="row_contain">
                    <img src="images/user-2.jpg" alt="" />
                    <span><b>Hugh Wilson</b><br>6 Friends in Common</span>
                    <button>+</button>
                </div>
                <div class="row_contain">
                    <img src="images/user-6.jpg" alt="" />
                    <span><b>Karen Masters</b><br>6 Friends in Common</span>
                    <button>+</button>
                </div>
            </div>

            <div class="row shadow">
                <div class="row_title">
                    <span>Activity Feed</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-7.jpg" alt="" />
                    <span>Marina Polson commented on Jason Mark’s <a href="" class="selected-orange">photo</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-2.jpg" alt="" />
                    <span>Jake Parker  liked Nicholas Grissom’s <a href="" class="selected-orange">status update</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-3.jpg" alt="" />
                    <span>Mary Jane Stark  added 20 new photos to her <a href="" class="selected-orange">gallery album</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-6.jpg" alt="" />
                    <span>Marina Polson commented on Jason Mark’s <a href="" class="selected-orange">photo</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user.jpg" alt="" />
                    <span>Jake Parker  liked Nicholas Grissom’s <a href="" class="selected-orange">status update</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-4.jpg" alt="" />
                    <span>Mary Jane Stark  added 20 new photos to her <a href="" class="selected-orange">gallery album</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-5.jpg" alt="" />
                    <span>Marina Polson commented on Jason Mark’s <a href="" class="selected-orange">photo</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-2.jpg" alt="" />
                    <span>Jake Parker  liked Nicholas Grissom’s <a href="" class="selected-orange">status update</a>..</span>
                </div>
                <div class="row_contain">
                    <img src="images/user-7.jpg" alt="" />
                    <span>Mary Jane Stark  added 20 new photos to her <a href="" class="selected-orange">gallery album</a>..</span>
                </div>
            </div>


            <div class="row shadow">
                <div class="row_title">
                    <span>Pages You May Like</span>
                    <a href="#">see more..</a>
                </div>
                <div class="row_contain">
                    <img src="images/group-1.png" alt="" />
                    <span><a href=""><b>The Marina Bar</b></a><br>Restaurant / Bar</span>
                </div>
                <div class="row_contain">
                    <img src="images/group-2.jpg" alt="" />
                    <span><a href=""><b>Caverna Roch</b></a><br>Rock / Band</span>
                </div>
                <div class="row_contain">
                    <img src="images/group-3.png" alt="" />
                    <span><a href=""><b>Pixel Digital Design</b></a><br>Company</span>
                </div>
                <div class="row_contain">
                    <img src="images/group-1.png" alt="" />
                    <span><a href=""><b>The Marina Bar</b></a><br>Restaurant / Bar</span>
                </div>
                <div class="row_contain">
                    <img src="images/group-2.jpg" alt="" />
                    <span><a href=""><b>Caverna Roch</b></a><br>Rock / Band</span>
                </div>
                <div class="row_contain">
                    <img src="images/group-3.png" alt="" />
                    <span><a href=""><b>Pixel Digital Design</b></a><br>Company</span>
                </div>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>



    <!-- Modal Messages -->
    <div class="modal modal-comments">
        <div class="modal-icon-select"><i class="fa fa-sort-asc" aria-hidden="true"></i></div>
        <div class="modal-title">
            <span>CHAT / MESSAGES</span>
             <a href="messages.html"><i class="fa fa-ellipsis-h"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="#">
                        <img src="images/user-7.jpg" alt="" />
                        <span><b>Diana Jameson</b><br>Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...<p>4 hours ago</p></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Elaine Dreyfuss</b><br>We’ll have to check that at the office and see if the client is on board with...<p>Yesterday at 9:56pm</p></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-3.jpg" alt="" />
                        <span><b>Jake Parker</b><br>Great, I’ll see you tomorrow!.<p>4 hours ago</p></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Modal Friends -->
    <div class="modal modal-friends">
        <div class="modal-icon-select"><i class="fa fa-sort-asc" aria-hidden="true"></i></div>
        <div class="modal-title">
            <span>FRIEND REQUESTS</span>
             <a href="friends.html"><i class="fa fa-ellipsis-h"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="#">
                        <img src="images/user-2.jpg" alt="" />
                        <span><b>Tony Stevens</b><br>4 Friends in Common</span>
                        <button class="modal-content-accept">Accept</button><button class="modal-content-decline">Decline</button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Tamara Romanoff</b><br>2 Friends in Common</span>
                        <button class="modal-content-accept">Accept</button><button class="modal-content-decline">Decline</button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-4.jpg" alt="" />
                        <span><b>Nicholas Grissom</b><br>1 Friend in Common</span>
                        <button class="modal-content-accept">Accept</button><button class="modal-content-decline">Decline</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Modal Profile -->
    <div class="modal modal-profile">
        <div class="modal-icon-select"><i class="fa fa-sort-asc" aria-hidden="true"></i></div>
        <div class="modal-title">
            <span>YOUR ACCOUNT</span>
             <a href="settings.html"><i class="fa fa-cogs"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="settings.html">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span><b>Profile Settings</b><br>Yours profile settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <span><b>Create a page</b><br>Create your page</span>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span><b>Log Out</b><br>Close your session</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- NavMobile -->
    <div class="mobilemenu">
        
        <div class="mobilemenu_profile">
            <img id="mobilemenu_portada" src="images/portada.jpg" />
            <div class="mobilemenu_profile">
                <img id="mobilemenu_profile_pic" src="images/user.jpg" /><br>
                <span>Jonh Hamstrong<br><p>150k followers / 50 follow</p></span>
            </div>
            <div class="mobilemenu_menu">
                <ul>
                    <li><a href="index.html" id="mobilemenu-selected"><i class="fa fa-globe"></i>Newsfeed</a></li>
                    <li><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a href="friends.html"><i class="fa fa-users"></i>Friends</a></li>
                    <li><a href="messages.html"><i class="fa fa-comments-o"></i>messages</a></li>
                    <li class="primarymenu"><i class="fa fa-compass"></i>Explore</li>
                    <ul class="mobilemenu_child">
                        <li style="border:none"><a href="#"><i class="fa fa-globe"></i>Activity</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Friends</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Groups</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Pages</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Saves</a></li>
                    </ul>
                    <li class="primarymenu"><i class="fa fa-user"></i>Rapid Access</li>
                    <ul class="mobilemenu_child">
                        <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Page.html</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Group.html</a></li>
                    </ul>
                </ul>
                    <hr>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">FAQ's</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    // Modals
    $(document).ready(function(){


        $("#messagesmodal").hover(function(){
            $(".modal-comments").toggle();
        });
        $(".modal-comments").hover(function(){
            $(".modal-comments").toggle();
        });



        $("#friendsmodal").hover(function(){
            $(".modal-friends").toggle();
        });
        $(".modal-friends").hover(function(){
            $(".modal-friends").toggle();
        });


        $("#profilemodal").hover(function(){
            $(".modal-profile").toggle();
        });
        $(".modal-profile").hover(function(){
            $(".modal-profile").toggle();
        });


        $("#navicon").click(function(){
            $(".mobilemenu").fadeIn();
        });
        $(".all").click(function(){
            $(".mobilemenu").fadeOut();
        });
    });
    </script>
    <script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>