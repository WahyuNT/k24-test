@extends('layouts.master')
@section('content')
    @livewire('member-db', ['id' => $member->id])
@endsection
