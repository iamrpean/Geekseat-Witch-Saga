@extends('layouts.master')
@push('css')
    <style>
        body{
            background-color: black !important;
        }
    </style>
@endpush
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                GeekSeat
            </div>
            <a href="{{ route('geekseat.index') }}" type="button" class="btn btn-outline-danger">BEGIN</a>
        </div>
    </div>
@endsection