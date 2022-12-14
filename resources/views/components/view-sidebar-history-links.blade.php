<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Manage posts</span>
    </a>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts</h6>
            <a class="collapse-item" href="{{route('post.create')}}">Create a post</a>
            <a class="collapse-item" href="{{route('post.index')}}">View all posts</a>
            <a class="collapse-item active" href="{{route('post.history')}}">View action history</a>
        </div>
    </div>
</li>
