@extends('layouts.backend.app')
@push('css')
@endpush

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit"></i>
                </div>
                <div>General Settings</div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.dashboard') }}" class="btn-shadow mr-3 btn btn-warning" name="button">
                    <i class="fas fa-arrow-left"></i>&nbsp;Back to dashboard
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="main-card mb-3 card">

                <div class="card-body">
                    @include('backend.settings.list')
                </div>
            </div>
        </div>
        <div class="col-md-9">
                <div class="main-card mb-3 card">
                    @include('backend.settings.message')
                </div>
            <form action="{{ route('app.settings.general.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="main-card mb-3 card">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Site Title</label>
                            <input id="site_title" type="text"
                                   class="form-control @error('site_title') is-invalid @enderror" name="site_title"
                                   value="{{ setting('site_title') ?? old('site_title') }}" required>

                            @error('site_title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Site Description</label>
                            <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror">{{ setting('site_description') ?? old('site_description') }}</textarea>

                            @error('site_description')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Site Address</label>
                            <textarea name="site_address" class="form-control @error('site_address') is-invalid @enderror">{{ setting('site_address') ?? old('site_address') }}</textarea>

                            @error('site_address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        

                        <button type="submit" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>&nbsp;Update
                        </button>
                    </div>

                </div>
                {{-- <div class="row">
                    <div class="col-md-9">
                        
                    </div>
                </div> --}}
            </form>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('.roleSelect').select2();
        });
        $('.dropify').dropify();
    </script>

@endpush
