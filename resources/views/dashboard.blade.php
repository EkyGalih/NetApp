@extends('layouts.app')

@section('title', $data['identity'] . '-' . $data['model'])
@section('header')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Selamat Datang, {{ session('username') }}!</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="index.html" class="text-muted text-hover-primary">NET-BPKAD</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row gy-5 gx-xl-10">
            <div class="col-sm-3">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <i class="ki-duotone ki-technology fs-5x me-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                                <span class="path7"></span>
                                <span class="path8"></span>
                                <span class="path9"></span>
                            </i>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">CPU Load</span>
                        </div>
                        <span class="badge badge-light-success fs-base" id="cpu">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <i class="ki-duotone ki-timer fs-5x me-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">UPTIME</span>
                        </div>
                        <span class="badge badge-light-success fs-base" id="uptime">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <i class="ki-duotone ki-information-4 fs-5x me-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">INFO</span>
                        </div>
                        <div class="fw-bold">Model : <span class="fw-bold">{{ $data['model'] }}</span></div>
                        <div class="fw-bold">OS : <span class="fw-semibold">{{ $data['version'] }}</span></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <i class="ki-duotone ki-external-drive fs-5x me-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">Free Memory/HDD</span>
                        </div>
                        <span class="fw-semibold">{{ Helpers::formatBytes($data['freememory']) }} /
                            {{ Helpers::formatBytes($data['freehdd']) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-5 gx-xl-10 mt-5">
            <div class="col-sm-4">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <i class="ki-duotone ki-graph-4 fs-5x me-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2" id="int1"></span>
                        </div>
                        <span class="fw-semibold badge badge-light-danger fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span id="upload"></span>
                            </i>
                        </span>
                        <span class="fw-semibold badge badge-light-success fs-base mt-3">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span id="download"></span>
                            </i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <i class="ki-duotone ki-graph-4 fs-5x me-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2" id="int2"></span>
                        </div>
                        <span class="fw-semibold badge badge-light-danger fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span id="upload-int2"></span>
                            </i>
                        </span>
                        <span class="fw-semibold badge badge-light-success fs-base mt-3">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span id="download-int2"></span>
                            </i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <i class="ki-duotone ki-graph-4 fs-5x me-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2" id="int3"></span>
                        </div>
                        <span class="fw-semibold badge badge-light-danger fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span id="upload-int3"></span>
                            </i>
                        </span>
                        <span class="fw-semibold badge badge-light-success fs-base mt-3">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span id="download-int3"></span>
                            </i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        setInterval('cpu();', 1000);

        function cpu() {
            $('#cpu').load('{{ route('dashboard.cpu') }}');
        }

        setInterval('uptime();', 1000);

        function uptime() {
            $('#uptime').load('{{ route('dashboard.uptime') }}');
        }

        setInterval('interface1();', 100);

        function interface1()
        {
            $('#int1').text('Varnion');
            $('#upload').load('{{ route('dashboard.trafic-up', ['interface' => 'Varnion']) }}');
            $('#download').load('{{ route('dashboard.trafic-down', ['interface' => 'Varnion']) }}');
        }

        setInterval('interface2();', 100);

        function interface2()
        {
            $('#int2').text('ether2-BLIP');
            $('#upload-int2').load('{{ route('dashboard.trafic-up', ['interface' => 'ether2-BLIP']) }}');
            $('#download-int2').load('{{ route('dashboard.trafic-down', ['interface' => 'ether2-BLIP']) }}');
        }
        setInterval('interface3();', 100);

        function interface3()
        {
            $('#int3').text('ether3-FiberNet');
            $('#upload-int3').load('{{ route('dashboard.trafic-up', ['interface' => 'ether3-FiberNet']) }}');
            $('#download-int3').load('{{ route('dashboard.trafic-down', ['interface' => 'ether3-FiberNet']) }}');
        }
    </script>
@endsection
