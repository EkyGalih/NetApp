@extends('layouts.app')
@section('title', session('identity'))
@section('menu-ip', 'show')
@section('address', 'active')
@section('header')
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
                    <li class="breadcrumb-item text-muted">IP Address</li>
                </ul>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <button type="button" class="btn btn-md btn-light-primary" data-bs-toggle="modal"
                    data-bs-target="#createIPModal">
                    <i class="ki-duotone ki-plus fs-2 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> Create IP Address
                </button>
            </div>
            @include('ip.address.partials.add')
        </div>
    </div>
@endsection
@section('content')
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
                        <th>Address</th>
                        <th>Network</th>
                        <th>Disabled</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ip_address as $address)
                        {{-- {{ dd($address) }} --}}
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ strtoupper($address['interface']) }}</td>
                            <td>{{ $address['address'] }}</td>
                            <td>{{ $address['network'] }}</td>
                            <td>
                                @if ($address['disabled'] == 'true')
                                    <form action="{{ route('address.status', $address['.id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light-success btn-sm">
                                            <i class="ki-duotone ki-double-check fs-2 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i> Enable
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('address.status', $address['.id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light-dark btn-sm">
                                            <i class="ki-duotone ki-cross fs-2 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i> Disable
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group mb-3">
                                    <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#editAddressModal-{{ $loop->index }}">
                                        <i class="ki-duotone ki-pencil fs-2 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i> Edit
                                    </button>
                                    <form action="{{ route('address.destroy', $address['.id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light-danger">
                                            <i class="ki-duotone ki-trash fs-2 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i> Delete
                                        </button>
                                    </form>
                                </div>
                                <!-- Modal -->
                                @include('ip.address.partials.edit')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
