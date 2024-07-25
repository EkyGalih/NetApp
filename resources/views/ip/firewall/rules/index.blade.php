@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-sm btn-light-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRuleModal">
        <i class="ki-duotone ki-plus fs-5 me-1"></i>
        Tambah Rule
    </button>
</div>
@include('ip.firewall.rules.partials.add')

<div class="table-responsive">
    <table class="table table-row-bordered table-row-dashed gy-4">
        <thead>
            <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th>No</th>
                <th>Action</th>
                <th>Chain</th>
                <th>Src.Address</th>
                <th>Dst.Address</th>
                <th>Protocol</th>
                <th>Src.Port</th>
                <th>Dst.Port</th>
                <th>In Interface</th>
                <th>Out Interface</th>
                <th>Src Address</th>
                <th>Dst Address</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rules as $item)
                {{-- {{ dd($rules) }} --}}
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                        @if ($item['action'])
                            @if ($item['action'] === 'drop' || $item['action'] === 'reject')
                                <i class="ki-duotone ki-cross text-danger fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            @elseif ($item['action'] === 'accept')
                                <i class="ki-duotone ki-double-check fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            @elseif ($item['action'] === 'add-dst-to-address-list')
                                <i class="ki-duotone ki-questionnaire-tablet fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            @elseif ($item['action'] === 'add-src-to-address-list')
                                <i class="ki-duotone ki-questionnaire-tablet fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            @elseif ($item['action'] === 'fasttrack-connection')
                                <i class="ki-duotone ki-double-right-arrow fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            @elseif ($item['action'] === 'log' || $item['action'] === 'passthrough')
                                <i class="ki-duotone ki-file fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            @elseif ($item['action'] === 'return')
                                <i class="ki-duotone ki-arrow-left fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            @endif
                            {{ $item['action'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['chain']))
                            {{ $item['chain'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['src-address']))
                            {{ $item['src-address'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['dst-address']))
                            {{ $item['dst-address'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['protocol']))
                            {{ $item['protocol'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['src-port']))
                            {{ $item['src-port'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['dst-port']))
                            {{ $item['dst-port'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['in-interface']))
                            {{ $item['in-interface'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['out-interface']))
                            {{ $item['out-interface'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['src-address-list']))
                            {{ $item['src-address-list'] }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item['dst-address-list']))
                            {{ $item['dst-address-list'] }}
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-icon btn-light-primary" data-bs-toggle="modal"
                                data-bs-target="#editRuleModal-{{ $loop->iteration }}">
                                <i class="ki-duotone ki-pencil fs-2 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </button>
                            @include('ip.firewall.rules.partials.edit')
                            <button type="button" class="btn btn-icon btn-light-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteRuleModal-{{ $loop->index }}">
                                <i class="ki-duotone ki-trash fs-2 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
