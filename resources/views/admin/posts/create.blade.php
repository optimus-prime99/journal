<x-admin-master>
    @section('content')

        <h1>Create</h1>
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                       name="name"
                       class="form-control" id="name"
                       aria-describedby=""
                       placeholder="Enter name">
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
                              rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    @endsection
</x-admin-master>
