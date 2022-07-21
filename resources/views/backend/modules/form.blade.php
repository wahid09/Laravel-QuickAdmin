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
    <div>{{ isset($module) ? 'Edit' : 'Create'}} Module</div>
     </div>
     <div class="page-title-actions">
        <a href="{{ route('app.modules.index') }}" class="btn-shadow mr-3 btn btn-warning" name="button">
         <i class="fas fa-arrow-left"></i>&nbsp;Back to list
        </a>
     </div>
    </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ isset($module) ? route('app.modules.update', $module->id) : route('app.modules.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($module)
                 @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">

                            <div class="card-body">
                                <h5 class="card-title">Manage Module</h5>

                                <div class="form-group">
                                    <label for="name">Name(English)</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $module->name ?? old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name_bn">Name(Bangla)</label>
                                    <input id="name_bn" type="text" class="form-control @error('name_bn') is-invalid @enderror" name="name_bn" value="{{ $module->name_bn ?? old('name_bn') }}" required autocomplete="name_bn" autofocus>

                                    @error('name_bn')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                @isset($module)
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

@endpush
