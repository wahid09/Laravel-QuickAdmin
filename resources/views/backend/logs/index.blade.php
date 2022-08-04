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
                <div>Logs</div>
            </div>

            <div class="page-title-actions">
{{--                @permission('module-create')--}}
{{--                <a href="{{ route('app.modules.create') }}" class="btn-shadow mr-3 btn btn-primary" name="button">--}}
{{--                    <i class="fas fa-plus-circle"></i>&nbsp;Create Module--}}
{{--                </a>--}}
{{--                @endpermission--}}
            </div>

        </div>
    </div>


    <div class="main-card mb-3 card">

        <div class="card-body">
            <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">URL</th>
                    <th class="text-center">Methods</th>
                    <th class="text-center">IP</th>
                    <th class="text-center">User</th>
                    <th class="text-center">User Agent</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logs as $item)
                    <tr>
                        <td class="text-center text-muted">{{ $loop->index+1 }}</td>
                        <td class="text-center">{{ $item->subject }}</td>
                        <td class="text-center">

                            <span class="badge badge-info">{{ $item->url }}</span>
                        </td>
                        <td class="text-center">{{ $item->method }}</td>
                        <td class="text-center">{{ $item->ip }}</td>
                        <td class="text-center">{{ $item->user_id }}</td>
                        <td class="text-center">{{ $item->agent }}</td>

                        <td class="text-center">
                            @permission('role-delete')
                            <button onclick="deleteData({{$item->id}})" type="button" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></button>
                            <form id="delete-{{$item->id}}" method="POST"
                                  action="{{ route('app.log_delete', $item->id) }}" style="display:none;">
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

@endsection
@push('js')

@endpush
