<x-admin-active-history-post-master>
    @section('content')
        <h1>View All History</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Posts History Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow-x:auto;">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Action</th>
                            <th>Post ID</th>
                            <th>Post data</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>User Ip</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Action</th>
                            <th>Post ID</th>
                            <th>Post data</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>User Ip</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{$log->id}}</td>
                                <td>{{$log->action}}</td>
                                <td>{{$log->post_id}}</td>
                                <td>{{$log->post_data}}</td>
                                <td>{{$log->created_at->diffForHumans()}}</td>
                                <td>{{$log->updated_at->diffForHumans()}}</td>
                                <td>{{$log->user_ip}}</td>
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



</x-admin-active-history-post-master>
