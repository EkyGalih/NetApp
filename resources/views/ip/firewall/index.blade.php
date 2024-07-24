@extends('layouts.app')
@section('title', session('identity'))
@section('menu-ip', 'show')
@section('firewall', 'active')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="rules-tab" data-bs-toggle="tab" data-bs-target="#rules" type="button"
                            role="tab" aria-controls="rules" aria-selected="true">RULES</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nat-tab" data-bs-toggle="tab" data-bs-target="#nat" type="button"
                            role="tab" aria-controls="nat" aria-selected="true">NAT</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mangle-tab" data-bs-toggle="tab" data-bs-target="#mangle" type="button"
                            role="tab" aria-controls="mangle" aria-selected="false">MANGLE</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="rules" role="tabpanel" aria-labelledby="rules-tab">
                        @include('ip.firewall.rules.index')
                    </div>
                    <div class="tab-pane fade" id="nat" role="tabpanel" aria-labelledby="nat-tab">
                        @include('ip.firewall.nat.index')
                    </div>
                    <div class="tab-pane fade" id="mangle" role="tabpanel" aria-labelledby="mangle-tab">
                        @include('ip.firewall.mangle.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
