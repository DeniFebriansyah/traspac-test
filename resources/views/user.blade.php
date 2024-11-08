@extends('layout.app')
@section('breadcrumb')
    <ol class="breadcrumb my-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active"><span>List User</span>
        </li>
    </ol>
@endsection
@section('content')
    <div class="table-container">
        <table class="table table-striped" id="table-1">
            <thead>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Kecamatan</th>
                <th>Titik Koordinat</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($user as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->subdistrict }}</td>
                        <td>{{ $item->latitude }}, {{ $item->longitude }}</td>
                        <td class="text-center">
                            <span>
                                <a href="">
                                    <i class="ri ri-search-eye-line info"></i>
                                </a>
                                <a href="">
                                    <i class="ri ri-pencil-line warning mx-2"></i>
                                </a>
                                <a data-coreui-toggle="modal" data-coreui-target="#delete"
                                    onclick="deleteData({{ $item->id }})">
                                    <i class="ri ri-delete-bin-line error"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
