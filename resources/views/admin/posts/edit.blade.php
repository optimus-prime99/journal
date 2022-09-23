<x-admin-master>
    @section('content')

        <h1>Edit post</h1>
        <form method="post" action="{{route('posts.edit',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                       name="name"
                       class="form-control" id="name"
                       aria-describedby=""
                       placeholder="Enter name"
                       value="{{$post->name}}">
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="file">File</label>--}}
            {{--                <input type="file"--}}
            {{--                       name="post_image"--}}
            {{--                       class="form-control-file"--}}
            {{--                       id="post_image">--}}
            {{--            </div>--}}
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description"
                          class="form-control"
                          id="description"
                          placeholder="Enter description"
                          cols="30"
                          rows="10">{{$post->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    @endsection
</x-admin-master>
