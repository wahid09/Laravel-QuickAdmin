@extends('layouts.backend.app')
@push('css')
<link href="{{asset('assets/select/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/dropify/dropify.min.css')}}" rel="stylesheet">
<style>
    .dropify-wrapper .dropify-message p{
        font-size: initial;
    }
</style>
@endpush

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
     <div class="page-title-heading">
        <div class="page-title-icon">
        <i class="pe-7s-check icon-gradient bg-mean-fruit"></i>
        </div>
    <div>{{ isset($permission) ? 'Edit' : 'Create'}} Permission</div>
     </div>
     <div class="page-title-actions">
        <a href="{{ route('app.permissions.index') }}" class="btn-shadow mr-3 btn btn-warning" name="button">
         <i class="fas fa-arrow-left"></i>&nbsp;Back to list
        </a>
     </div>    
    </div>
    </div>
                        
                        
    <div class="row">
        <div class="col-12">
            <form action="{{ isset($permission) ? route('app.permissions.update', $permission->id) : route('app.permissions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($permission)
                 @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">                  
                
                            <div class="card-body">
                                <h5 class="card-title">Manage Permission</h5>

                                <div class="form-group">
                                    <label for="module">Module</label>
                                    <select id="module" class="form-control @error('module') is-invalid @enderror roleSelect" name="module" required autofocus>
                                        @foreach ($modules as $module)
                                         <option value="{{ $module->id}}" @isset($permission){{($permission->module->id == $module->id) ? 'selected' : ''}}@endisset
                                            >{{ $module->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('module')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $permission->name ?? old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                @isset($role)
                                <i class="fas fa-arrow-circle-up"></i>&nbsp;Update</button>
                                @else
                                <i class="fas fa-plus-circle"></i>&nbsp;Create</button>
                                @endisset
                                
                                
                            </div>
                                            
                        </div>
                    </div>
                    
                </div>
           </form> 
        </div>
    </div>
                        
@endsection
@push('js')
<script src="{{asset('assets/select/select2.min.js')}}"></script>
<script src="{{asset('assets/dropify/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.roleSelect').select2();
    });
    $('.dropify').dropify();
</script>

@endpush