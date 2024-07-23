@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Interface</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">NET-BPKAD</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Interface</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-row-bordered table-row-dashed gy-4">
                    <thead>
                        <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>No</th>
                            <th>Nama Interface</th>
                            <th>Type</th>
                            <th>RX/TX</th>
                            <th>Disabled</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($interfaces as $interface)
                        {{-- {{ dd($interface) }} --}}
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $interface['name'] }}</td>
                                <td>{{ strtoupper($interface['type']) }}</td>
                                <td><div id="trafik"></div></td>
                                <td>
                                    @if ($interface['disabled'] == 'true')
                                        <a href="{{ route('interface.enable', $interface['.id']) }}"
                                           class="btn btn-success btn-sm">Enable</a>
                                    @else
                                        <a href="{{ route('interface.disable', $interface['.id']) }}"
                                            class="btn btn-danger btn-sm">Disable</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
