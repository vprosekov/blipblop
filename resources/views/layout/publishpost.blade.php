<div class="row">
    <div class="publish">
        <div class="row_title">
            <span><i class="fa fa-newspaper-o" aria-hidden="true"></i> New post</span>

        </div>
        <form method="" action="#" id="publsh-form">
            <div class="publish_textarea">
                <img class="border-radius-image"
                    src="{{ Auth::user()->profile_photo_id ? Auth::user()->profile_photo_id : env('APP_URL') . 'images/no-profile-pic.jpeg' }}"
                    alt="" />
                <textarea name="content" id="post-content" type="text" placeholder="¿Whats up, {{ Auth::user()->name }}?"
                    style="resize: none;"></textarea>
            </div>
            <div class="publish_icons">
                <ul>
                    <li>
                        {{-- <i class="fa fa-file"></i> input file name file(1 file image) --}}
                        <input type="file" name="file" id="file">
                    </li>
                </ul>
                <button type="button" id="publish-post-btn">Publish</button>
            </div>
        </form>
    </div>
    <script>
        $().ready(function() {
            $("#publish-post-btn").click(function(e) {
                e.preventDefault();
                // validate
                var post = $("#post-content").val();
                if (post == "") {
                    alert("Please write something");
                    return false;
                }
                var formData = new FormData($('#publsh-form')[0]);
                $.ajax({
                    type: 'POST',
                    url: '/api/posts',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert('Post added');
                        window.location.reload();

                    },
                    error: function(data) {
                        alert('Error');
                    }
                });

            });
        });
    </script>
</div>
