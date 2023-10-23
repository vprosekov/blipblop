<!DOCTYPE html>
<html lang="en">

<head>

    @include('layout.head')

</head>

<body>

    @include('layout.header')

    <div class="all">
        <div class="rowfixed"></div>
        <div class="left_row">
            @include('layout.leftrow')
        </div>



        <div class="right_row">
            @yield('content')
        </div>

        <div class="suggestions_row">
            @include('layout.suggestions')
        </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>



    <!-- Modal Messages -->
    <div class="modal modal-comments">
        <div class="modal-icon-select"><i class="fa fa-sort-asc" aria-hidden="true"></i></div>
        <div class="modal-title">
            <span>CHAT / MESSAGES</span>
            <a href="messages"><i class="fa fa-ellipsis-h"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="#">
                        <img src="images/user-7.jpg" alt="" />
                        <span><b>Diana Jameson</b><br>Hi James! It’s Diana, I just wanted to let you know that we have
                            to reschedule...<p>4 hours ago</p></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Elaine Dreyfuss</b><br>We’ll have to check that at the office and see if the client is
                            on board with...<p>Yesterday at 9:56pm</p></span>
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
            <a href="friends"><i class="fa fa-ellipsis-h"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="#">
                        <img src="images/user-2.jpg" alt="" />
                        <span><b>Tony Stevens</b><br>4 Friends in Common</span>
                        <button class="modal-content-accept">Accept</button><button
                            class="modal-content-decline">Decline</button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Tamara Romanoff</b><br>2 Friends in Common</span>
                        <button class="modal-content-accept">Accept</button><button
                            class="modal-content-decline">Decline</button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-4.jpg" alt="" />
                        <span><b>Nicholas Grissom</b><br>1 Friend in Common</span>
                        <button class="modal-content-accept">Accept</button><button
                            class="modal-content-decline">Decline</button>
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
            <a href="settings"><i class="fa fa-cogs"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="settings">
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
                    <a href="/logout">
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
            <div class="mobilemenu_profile">
                <img id="mobilemenu_profile_pic" src="{{Auth::user()->profile_photo_id ? Auth::user()->profile_photo_id : env("APP_URL")."images/no-profile-pic.jpeg"}}" /><br>
                <span>
                    {{ Auth::user()->name }}<br>
                    <p>150k followers / 50 follow</p>
                </span>
            </div>
            <div class="mobilemenu_menu">
                <ul>
                    <li><a href="index"><i class="fa fa-globe"></i>Newsfeed</a></li>
                    <li><a href="profile" id="mobilemenu-selected"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a href="friends"><i class="fa fa-users"></i>Friends</a></li>
                    <li><a href="messages"><i class="fa fa-comments-o"></i>messages</a></li>
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
                        <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Page</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Group</a>
                        </li>
                    </ul>
                </ul>
                <hr>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">FAQ's</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>



    
    <script>
        // Modals
        $(document).ready(function() {


            $("#messagesmodal").hover(function() {
                $(".modal-comments").toggle();
            });
            $(".modal-comments").hover(function() {
                $(".modal-comments").toggle();
            });



            $("#friendsmodal").hover(function() {
                $(".modal-friends").toggle();
            });
            $(".modal-friends").hover(function() {
                $(".modal-friends").toggle();
            });


            $("#profilemodal").hover(function() {
                $(".modal-profile").toggle();
            });
            $(".modal-profile").hover(function() {
                $(".modal-profile").toggle();
            });


            $("#navicon").click(function() {
                $(".mobilemenu").fadeIn();
            });
            $(".all").click(function() {
                $(".mobilemenu").fadeOut();
            });
        });
    </script>
    <script>
        window.onscroll = function() {
            scrollFunction()
        };

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
    

    @yield('script')
</body>

</html>
