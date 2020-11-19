@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{asset('assets/datatable/css/dataTables.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-user icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Users</div>
        </div>
        <div class="page-title-actions">
            @permission('user-create')
            <a href="{{ route('app.users.create') }}" class="btn-shadow mr-3 btn btn-primary" name="button">
                <i class="fas fa-plus-circle"></i>&nbsp;Create User
            </a>
            @endpermission
        </div>    
    </div>
</div>
                        
                        
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
                                    
            <div class="table-responsive">
                <table id="example" class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name(English)</th>
                            <th class="text-center">Name(Bangle)</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->index+1 }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="{{ config('app.placeholder').'160.png'}}">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $item->name}}</div>
                                                <div class="widget-subheading opacity-7">
                                                    @if($item->role)
                                                <span class="badge badge-info">{{ $item->role->name}}</span>
                                                    @else 
                                                    <span class="badge badge-warning">No Role Found</span>
                                                    @endif
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item->name_bn }}</td>
                                    <td class="text-center">
                                        {{ $item->email}}
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == true)
                                        <span class="badge badge-info">Active</span>
                                        @else
                                        <span class="badge badge-warning">Inactive</span> 
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @permission('user-update')
                                        <a href="{{ route('app.users.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        @endpermission

                                        @permission('user-delete')
                                        <button onclick="deleteData({{$item->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        <form id="delete-{{$item->id}}" method="POST" action="{{ route('app.users.destroy', $item->id) }}" style="display:none;">
                                        @csrf 
                                        @method('DELETE')
                                        </form>
                                        @endpermission
                                    </td>
                                </tr> 
                            @endforeach
                                            
                                            
                        </tbody>
                </table>
            </div>
                                    
        </div>
    </div>
</div>
                        
@endsection
@push('js')

<script src="{{asset('assets/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/datatable/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

@endpush