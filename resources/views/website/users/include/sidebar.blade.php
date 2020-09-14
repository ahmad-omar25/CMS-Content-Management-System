<div class="wn__sidebar">
    <aside class="widget recent_widget">
        <ul>
            <li class="list-group-item">
                <img src="{{asset('assets/users/' . auth()->user()->user_image)}}" alt="{{ auth()->user()->name }}">
            </li>

            <li class="list-group-item"><a href="{{route('profile.index')}}">Profile</a></li>
            <li class="list-group-item"><a href="{{route('posts.index')}}">My Posts</a></li>
            <li class="list-group-item"><a href="{{route('posts.create')}}">Create Post</a></li>
            <li class="list-group-item"><a href="">Manage Comments</a></li>
            <li class="list-group-item"><a href="{{route('user.logout')}}">Logout</a>
            </li>
        </ul>
    </aside>
</div>
