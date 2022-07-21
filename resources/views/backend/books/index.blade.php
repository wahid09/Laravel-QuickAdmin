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
            <div>Module</div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('app.modules.create') }}" class="btn-shadow mr-3 btn btn-primary" name="button">
                <i class="fas fa-plus-circle"></i>&nbsp;Create Module
            </a>
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
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $item->name }}</td>

                                    <td class="text-center">{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('app.modules.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>


                                        <button onclick="deleteData({{$item->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        <form id="delete-{{$item->id}}" method="POST" action="{{ route('app.modules.destroy', $item->id) }}" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                        </form>
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

@endpush
