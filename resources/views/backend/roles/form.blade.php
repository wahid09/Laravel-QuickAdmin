@extends('layouts.backend.app')
@push('css')

@endpush

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
     <div class="page-title-heading">
        <div class="page-title-icon">
        <i class="pe-7s-check icon-gradient bg-mean-fruit"></i>
        </div>
    <div>{{ isset($role) ? 'Edit' : 'Create'}} Role</div>
     </div>
     <div class="page-title-actions">
        <a href="{{ route('app.roles.index') }}" class="btn-shadow mr-3 btn btn-warning" name="button">
         <i class="fas fa-arrow-left"></i>&nbsp;Back to list
        </a>
     </div>    
    </div>
    </div>
                        
                        
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">                  
            <form action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}" method="POST">
                @csrf
                @isset($role)
                 @method('PUT')
                @endisset
                <div class="card-body">
                    <h5 class="card-title">Manage Roles</h5>
                    <div class="form-group">
                        <label for="name">Name(English)</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name ?? old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name_bn">Name(Bangla)</label>
                        <input id="name_bn" type="text" class="form-control @error('name_bn') is-invalid @enderror" name="name_bn" value="{{ $role->name_bn ?? old('name_bn') }}" required autocomplete="name_bn" autofocus>

                        @error('name_bn')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <strong>Manage Permission For Role</strong>
                        @error('permissions')
                        <p class="p-2">
                        <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        </p>
                        @enderror
                    </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select-all">
                                <label class="custom-control-label" for="select-all">Select All</label>
                            </div>
                        </div>
                        @forelse ($modules->chunk(4) as $key=>$chunks)
                            <div class="form-row">
                                @foreach ($chunks as $module)
                                    <div class="col">
                                    <h5>Module: {{ $module->name}}</h5>
                                    @foreach ($module->permissions as $permission)
                                       <div class="mb-3 ml-4">
                                           <div class="custom-control custom-checkbox mb-2">
                                           <input type="checkbox" class="custom-control-input" id="permission-{{$permission->id}}" name="permissions[]" value="{{$permission->id }}" @isset($role)
                                           @foreach ($role->permissions as $assignedPermission)
                                               {{ $permission->id == $assignedPermission->id ? 'checked' : ''}}
                                           @endforeach 
                                           @endisset>
                                           <label for="permission-{{$permission->id}}" class="custom-control-label">{{$permission->name}}</label>
                                           </div>
                                       </div> 
                                    @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="row">
                                <div class="col text-center">
                                    <strong>No Module Found</strong>
                                </div>
                            </div>
                        @endforelse
                    
                    <button type="submit" class="btn btn-primary">
                        @isset($role)
                        <i class="fas fa-arrow-circle-up"></i>&nbsp;Update</button>
                        @else
                         <i class="fas fa-plus-circle"></i>&nbsp;Create</button>
                         @endisset
                    </div>
            </form>                      
            </div>
        </div>
    </div>
                        
@endsection
@push('js')

<script>
    $('#select-all').click(function(event){
        if(this.checked){
            $(':checkbox').each(function(){
                this.checked = true;
            });
        }else{
            $(':checkbox').each(function(){
                this.checked = false;
            });
        }
        
    });
</script>

@endpush