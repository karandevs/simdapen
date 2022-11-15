@extends('layouts.main')

@section('content')
    <!-- Table head options start -->
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        Data Pangkat dan Golongan
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Pangkat</th>
                                <th>Golongan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key=>$value)
                            <tr>
                                <td>{{ $value->pangkat }}</td>
                                <td>{{ $value->golongan }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Table head options end -->
@endsection