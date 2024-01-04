@extends('includes.main')
@section('title', 'Permissions')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <a href="{{route('add.permission')}}" class="btn btn-inverse-info p-3 mb-5" >Add Permission</a>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Permission Name</th>
                                <th>Group Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->group_name}}</td>
                                <td>
                                    <a href="{{route('edit.permission', $item->id)}}" class="btn btn-inverse-success">Edit</a>
                                    <a href="{{route('delete.permission', $item->id)}}" class="btn btn-inverse-danger " id="delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">
    $(function(){
        $(document).on('click', '#delete', function(e){
            
            e.preventDefault();
            const page = $(this).attr('href');
    
            Swal.fire({
                title: 'Delete Permission',
                text: 'Do you want to delete this permission?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result)=>{
                if(result.value){
                    window.location.href = page
                }
            });
        });
    });
</script>
@endsection