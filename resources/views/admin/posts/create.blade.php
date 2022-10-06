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
                       placeholder="Enter name"  required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                    <textarea name="description"
                              class="form-control"
                              id="description"
                              placeholder="Enter description"
                              cols="30"
                              rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="closed_at">Close at</label>
                <input style="width: 180px" type="text" class="form-control" name="closed_at" id="closed_at" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    @endsection

    @section('scripts')
            <script src="{{asset('https://cdn.jsdelivr.net/npm/flatpickr')}}"></script>
            <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css')}}">
            <script>
                flatpickr('#closed_at', {
                    enableTime: true
                })
            </script>
        @endsection

    @section('css')
            /*<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">*/
        @endsection
</x-admin-master>
