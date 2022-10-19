<x-admin-active-view-post-master>
    @section('content')
        <h1>View All Posts</h1>
        @if(session('message'))
            <div class="alert alert-danger"> {{session('message')}} </div>
        @elseif(session('post-created-message'))
            <div class="alert alert-success"> {{session('post-created-message')}} </div>
        @elseif(session('post-updated-message'))
            <div class="alert alert-success"> {{session('post-updated-message')}} </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Posts DataTable</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow-x:auto;">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Opened At</th>
                            <th>Closed At</th>
                            <th>Show</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Opened At</th>
                            <th>Closed At</th>
                            <th>Show</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td><p>{{$post->opened_at}}</p></td>
                                <td>{{$post->closed_at}}</td>
                                <td>
                                        <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                </td>

                                <td>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger deletePostBtn" >Delete</button>
                                    </form>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="post_id">
                                                        <h5>Are you sure you want to delete this post</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Yes, Delete!</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection

    @section('scripts')
            <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
            <script src="{{'js/demo/datatables-demo.js'}}"></script>
        @endsection

    @section('scripts3')
            <script>
                $(document).ready(function () {
                    $('.deletePostBtn').click(function (e) {
                        e.preventDefault();
                        var post_id = {{$post->id}}
                        $('#post_id').val(post_id);

                        $('#deleteModal').modal('show');

                    });
                });
            </script>



        @endsection

</x-admin-active-view-post-master>
