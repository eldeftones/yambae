@extends('layouts.app')

@section('content')
    <edit-bill bill-id="{{ $billId }}" student-id="{{ $studentId }}" />
@endsection
