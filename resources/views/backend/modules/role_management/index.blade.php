@extends('backend.layouts.app')

@section('content')
    @include('backend.layouts.headers.cards')
    
    {{-- <div class="container-fluid mt--7">
        <div class="row">
            <h1>Role Management Here</h1>
        </div>
        <div class="row mt-5">
            <h1>Role Management Here</h1>
        </div>
    </div> --}}
    <div class="container">
        <h1>This is Role Index</h1>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush