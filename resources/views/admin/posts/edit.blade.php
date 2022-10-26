<x-admin-master>
    @section('content')

        <h1>Edit post</h1>
{{--        <form method="post" action="{{route('posts.edit',$post->id)}}" enctype="multipart/form-data">--}}
        <form id="submitPostForm"  method="post" action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
{{--            @method('PATCH')--}}
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                       name="name"
                       class="form-control" id="name"
                       aria-describedby=""
                       placeholder="{{$post->name}}"
                       value="{{$post->name}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description"
                          class="form-control"
                          id="description"
                          placeholder="Enter description"
                          cols="30"
                          rows="10" required>{{$post->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="opened_at">Open at</label>
                <input style="width: 180px" type="text" class="form-control" name="opened_at" id="opened_at" required>{{$post->opened_at}}
            </div>


            <div class="form-group">
                <label for="closed_at">Close at</label>
                <input style="width: 180px" type="text" class="form-control" name="closed_at" id="closed_at" required>{{$post->closed_at}}
            </div>
            <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
        </form>

    @endsection


{{--        @section('scripts')--}}
{{--            <script src="{{asset('https://cdn.jsdelivr.net/npm/flatpickr')}}"></script>--}}
{{--            <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css')}}">--}}
{{--            <script>--}}
{{--                flatpickr('#closed_at', {--}}
{{--                    enableTime: true--}}
{{--                })--}}
{{--            </script>--}}
{{--        @endsection--}}

        @section('scripts1')
            <script src="{{asset('https://cdn.jsdelivr.net/npm/flatpickr')}}"></script>
            <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css')}}">
            <script>
                flatpickr('#closed_at', {
                    enableTime: true
                })
            </script>
        @endsection

        @section('scripts2')
            <script src="{{asset('https://cdn.jsdelivr.net/npm/flatpickr')}}"></script>
            <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css')}}">
            <script>
                flatpickr('#opened_at', {
                    enableTime: true
                })
            </script>
        @endsection


        @section('css')
            /*<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">*/
        @endsection
        @section('submitButton')
            <script>
                $("#btnSubmit").click(function (e) {
                    $("#submitPostForm").submit();
                    $("#btnSubmit").attr("disabled", "disabled");
                })
            </script>
        @endsection
</x-admin-master>
