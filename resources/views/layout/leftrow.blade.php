<div class="left_row_profile">
    <div class="left_row_profile">
        <img id="profile_pic" src="{{Auth::user()->profile_photo_id ? Auth::user()->profile_photo_id : env("APP_URL")."images/no-profile-pic.jpeg"}}" />
        <span>
            {{ Auth::user()->name }}<br>
            <p>150k followers / 50 follow</p>
        </span>
    </div>
</div>
<div class="rowmenu">
    <ul>
        <li><a href="/index" id="rowmenu-selected"><i class="fa fa-globe"></i>Newsfeed</a></li>
        <li><a href="/profile"><i class="fa fa-user"></i>Profile</a></li>
        <li><a href="/friends"><i class="fa fa-users"></i>Friends</a></li>
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
            <li style="border:none"><a href="#">Your-Page</a></li>
            <li style="border:none"><a href="#">Your-Group</a></li>
        </ul>
    </ul>
</div>
