@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{asset('assets/datatable/css/dataTables.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-check icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Roles</div>
        </div>
        <div class="page-title-actions">
            @permission('role-create')
            <a href="{{ route('app.roles.create') }}" class="btn-shadow mr-3 btn btn-primary" name="button">
                <i class="fas fa-plus-circle"></i>&nbsp;Create Role
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
                            <th class="text-center">Name(English)</th>
                            <th class="text-center">Name(Bangle)</th>
                            <th class="text-center">Permission</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->name_bn }}</td>
                                    <td class="text-center">
                                        @if($item->permissions->count() >0)
                                        <span class="badge badge-info">{{ $item->permissions->count() }}</span>
                                        @else 
                                        <span class="badge badge-warning">No Permission Found</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @permission('role-update')
                                        <a href="{{ route('app.roles.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        @endpermission

                                        @permission('role-delete')
                                        @if($item->deletable == true)
                                        <button onclick="deleteData({{$item->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        <form id="delete-{{$item->id}}" method="POST" action="{{ route('app.roles.destroy', $item->id) }}" style="display:none;">
                                        @csrf 
                                        @method('DELETE')
                                        </form>
                                        @endif
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