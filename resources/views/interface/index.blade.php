@extends('layouts.app')
@section('title', session('identity'))
@section('interface', 'active')
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
                    <li class="breadcrumb-item text-muted">Interface</li>
                </ul>
            </div>
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
                        <th>Type</th>
                        <th>Upload/Download</th>
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
                            <td>
                                {{ Helpers::formatBytes($interface['rx-byte'], null) }} /
                                {{ Helpers::formatBytes($interface['tx-byte'], null) }}
                                {{-- Ambil data secara realtime menggunakan route tanpa javascript --}}
                                {{-- @php
                                    $upload = 'http://127.0.0.1:8000/dashboard/trafic/up/' . $interface['name'];
                                @endphp
                                <span id="trafic-up-{{ $loop->index }}">
                                    @php
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $upload);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        $traficUp = curl_exec($ch);
                                        if (curl_errno($ch)) {
                                            echo 'Error:' . curl_error($ch);
                                        } else {
                                            echo $traficUp;
                                        }
                                        curl_close($ch);
                                    @endphp
                                </span> --}}
                                {{-- <span class="trafic-up" data-interface="{{ $interface['name'] }}"
                                    id="trafic-up-{{ $loop->index }}"></span> /
                                <span class="trafic-down" data-interface="{{ $interface['name'] }}"
                                    id="trafic-down-{{ $loop->index }}"></span> --}}
                            </td>
                            <td>
                                @if ($interface['disabled'] == 'true')
                                    <form action="{{ route('interface.status', $interface['.id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light-success btn-sm">
                                            <i class="ki-duotone ki-double-check fs-2 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i> Enable
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('interface.status', $interface['.id']) }}" method="POST">
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
                                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#editInterfaceModal-{{ $loop->index }}">
                                    <i class="ki-duotone ki-pencil fs-2 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i> Edit
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editInterfaceModal-{{ $loop->index }}" tabindex="-1"
                                    aria-labelledby="editInterfaceModalLabel-{{ $loop->index }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editInterfaceModalLabel-{{ $loop->index }}">
                                                    Edit Interface</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('interface.update', $interface['.id']) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="nameInput-{{ $loop->index }}"
                                                            class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            id="nameInput-{{ $loop->index }}"
                                                            value="{{ $interface['name'] }}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        // function trafic() {
        //     $('.trafic-up').each(function() {
        //         var interfaceName = $(this).data('interface');
        //         var elementId = $(this).attr('id');

        //         var url = '{{ route('dashboard.trafic-up', ['interface' => '__interface__']) }}'.replace(
        //             '__interface__', interfaceName);
        //         $('#' + elementId).load(url);
        //     });
        //     $('.trafic-down').each(function() {
        //         var interfaceName = $(this).data('interface');
        //         var elementId = $(this).attr('id');

        //         var url = '{{ route('dashboard.trafic-down', ['interface' => '__interface__']) }}'.replace(
        //             '__interface__', interfaceName);
        //         $('#' + elementId).load(url);
        //     });
        // }

        // setInterval(trafic, 1000);
    </script>
@endsection
