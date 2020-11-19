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
    <div>{{ isset($user) ? 'Edit' : 'Create'}} User</div>
     </div>
     <div class="page-title-actions">
        <a href="{{ route('app.users.index') }}" class="btn-shadow mr-3 btn btn-warning" name="button">
         <i class="fas fa-arrow-left"></i>&nbsp;Back to list
        </a>
     </div>    
    </div>
    </div>
                        
                        
    <div class="row">
        <div class="col-12">
            <form action="{{ isset($user) ? route('app.users.update', $user->id) : route('app.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($user)
                 @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">                  
                
                            <div class="card-body">
                                <h5 class="card-title">Manage User</h5>
                                <div class="form-group">
                                    <label for="name">Name(English)</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_bn">Name(Bangla)</label>
                                    <input id="name_bn" type="text" class="form-control @error('name_bn') is-invalid @enderror" name="name_bn" value="{{ $user->name_bn ?? old('name_bn') }}" required autocomplete="name_bn" autofocus>

                                    @error('name_bn')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name_bn">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" {{ !isset($user) ? 'required' : '' }} autocomplete="password" autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password">Confirm password</label>
                                    <input id="confirm_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" {{ !isset($user) ? 'required' : '' }} autocomplete="password" autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                
                            </div>
                                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">                  
                
                            <div class="card-body">
                                <h5 class="card-title">Select Role And Status</h5>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" class="form-control @error('role') is-invalid @enderror roleSelect" name="role" required autofocus>
                                        @foreach ($roles as $role)
                                         <option value="{{ $role->id}}" @isset($user){{($user->role->id == $role->id) ? 'selected' : ''}}@endisset
                                            >{{ $role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input id="avatar" type="file" class="dropify form-control @error('avatar') is-invalid @enderror" name="avatar">

                                    @error('avatar')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    {{-- <label for="status">Status</label> --}}
                                    <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input @error('status') is-invalid @enderror" id="status" name="status" @isset($user) {{ $user->status==true ? 'checked' : ''}} @endisset>
                                    <label class="custom-control-label" for="status">Status</label>
                                    </div>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($user)
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