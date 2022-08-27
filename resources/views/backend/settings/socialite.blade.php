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
                <div>Socialite Settings</div>
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
                <!-- form start -->
            <form id="settingsFrom" method="POST" action="{{ route('app.settings.socialite.update') }}">
                @csrf
                @method('PATCH')
                <!-- general form elements -->
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="facebook_client_id">Facebook Client Id</label>
                                    <input type="text" name="facebook_client_id" id="facebook_client_id"
                                           class="form-control @error('mail_mailer') is-invalid @enderror"
                                           value="{{ setting('facebook_client_id') ?? old('facebook_client_id') }}"
                                           placeholder="Client Id">
                                    @error('facebook_client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="facebook_client_secret">Facebook Client Secret</label>
                                    <input type="text" name="facebook_client_secret" id="facebook_client_secret"
                                           class="form-control @error('facebook_client_secret') is-invalid @enderror"
                                           value="{{ setting('facebook_client_secret') ?? old('facebook_client_secret') }}"
                                           placeholder="Secret">
                                    @error('facebook_client_secret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="google_client_id">Google Client Id</label>
                                    <input type="text" name="google_client_id" id="google_client_id"
                                           class="form-control @error('mail_mailer') is-invalid @enderror"
                                           value="{{ setting('google_client_id') ?? old('google_client_id') }}"
                                           placeholder="Client Id">
                                    @error('google_client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="google_client_secret">Google Client Secret</label>
                                    <input type="text" name="google_client_secret" id="google_client_secret"
                                           class="form-control @error('google_client_secret') is-invalid @enderror"
                                           value="{{ setting('google_client_secret') ?? old('google_client_secret') }}"
                                           placeholder="Secret">
                                    @error('google_client_secret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="github_client_id">Github Client Id</label>
                                    <input type="text" name="github_client_id" id="github_client_id"
                                           class="form-control @error('mail_mailer') is-invalid @enderror"
                                           value="{{ setting('github_client_id') ?? old('github_client_id') }}"
                                           placeholder="Client Id">
                                    @error('github_client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="github_client_secret">Github Client Secret</label>
                                    <input type="text" name="github_client_secret" id="github_client_secret"
                                           class="form-control @error('github_client_secret') is-invalid @enderror"
                                           value="{{ setting('github_client_secret') ?? old('github_client_secret') }}"
                                           placeholder="Secret">
                                    @error('github_client_secret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-danger" onClick="resetForm('settingsFrom')">
                            <i class="fas fa-redo"></i>
                            <span>Reset</span>
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-circle-up"></i>
                            <span>Update</span>
                        </button>

                    </div>
                </div>
                <!-- /.card -->
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
