@extends('layouts.dashboard')

@section('content')
<div class="pagetitle">
    <h1>Employee</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
            <li class="breadcrumb-item active">Employee</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
@endsection
