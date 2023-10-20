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
    </div>
    <div class="navbar_icons">
        <ul>
            <li id="friendsmodal"><i class="fa fa-user-o"></i><span id="notification">5</span></li>
            <li id="messagesmodal"><i class="fa fa-comments-o"></i><span id="notification">2</span></li>
            <a href="" style="color:white"><li><i class="fa fa-globe"></i></li></a>
        </ul>
    </div>
    <div class="navbar_user" id="profilemodal" style="cursor:pointer">
        <img src="{{Auth::user()->profile_photo_id ? Auth::user()->profile_photo_id : env("APP_URL")."images/no-profile-pic.jpeg"}}" alt="" />
        <span id="navbar_user_top">{{ Auth::user()->name }}<br><p>good boy</p></span><i class="fa fa-angle-down"></i>
    </div>
</div>