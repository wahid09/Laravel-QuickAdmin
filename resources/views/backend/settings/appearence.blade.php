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
                <div>Appearence Settings</div>
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
            <form action="{{ route('app.settings.appearence.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="main-card mb-3 card">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="site_logo">Site Logo (Only image are allowed)</label>
                            <input id="site_logo" type="file"
                                   class="dropify form-control @error('site_logo') is-invalid @enderror"
                                   name="site_logo" data-default-file="{{ setting('site_logo') != null ?  Storage::url(setting('site_logo')) : '' }}">

                            @error('site_logo')
                            <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon (Only image are allowed, size: 33X33)</label>
                            <input id="favicon" type="file"
                                   class="dropify form-control @error('favicon') is-invalid @enderror"
                                   name="favicon" data-default-file="{{ setting('favicon') != null ? Storage::url(setting('favicon')) : '' }}">

                            @error('favicon')
                            <span class="text-danger" role="alert">
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
