@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{asset('assets/datatable/css/dataTables.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-cloud icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Backups</div>
        </div>
        <div class="page-title-actions">
            @permission('backup-delete')
            <button type="button" onclick="event.preventDefault(); document.getElementById('cleanBackup').submit();" class="btn-shadow mr-3 btn btn-warning" name="button">
                <i class="fas fa-trash"></i>&nbsp;Clean old Backup
            </button>
            <form id="cleanBackup" action="{{ route('app.backups.clean') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            @endpermission

            @permission('backup-create')
            <button type="button" onclick="event.preventDefault(); document.getElementById('createBackup').submit();" class="btn-shadow mr-3 btn btn-primary" name="button">
                <i class="fas fa-plus-circle"></i>&nbsp;Create Backup
            </button>
            <form id="createBackup" action="{{ route('app.backups.store') }}" method="POST" style="display: none;">
                @csrf
            </form>
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
                            <th class="text-center">File Name</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($backups as $key=>$backup)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->index+1 }}</td>
                                    <td class="text-center"><code>{{ $backup['file_name'] }}</code></td>
                                    <td class="text-center">{{ $backup['file_size'] }}</td>
                                    
                                    <td class="text-center">{{ $backup['created_at'] }}</td>
                                    <td class="text-center">
                                    <a href="{{ route('app.backups.download', $backup['file_name'])}}" class="btn btn-primary"><i class="fas fa-download"></i><span>Download</span></a>

                                    @permission('backup-delete')
                                        <button onclick="deleteData({{$key}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        <form id="delete-{{$key}}" method="POST" action="{{ route('app.backups.destroy', $backup['file_name']) }}" style="display:none;">
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