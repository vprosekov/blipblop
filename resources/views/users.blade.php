@extends('layout.layout')

@section('content')

    <div class="row border-radius">
        <div class="friend">
            <div class="friend_title">
                <img src="images/user-3.jpg" alt="" />
                <span><b>Stagg Clothing</b><br>
                    <p>1 Friends in Common</p>
                </span>
                <button class="add-friend">Add</button>
            </div>
            <div class="friend_title">
                <img src="images/user-6.jpg" alt="" />
                <span><b>Tamara Romanoff</b><br>
                    <p>4 Friends in Common</p>
                </span>
                <button class="delete-friend">Delete</button>
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

@stop