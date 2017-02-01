@extends('app')
@section('controller', 'YachtsForm')
@section('title', 'Добавление яхты')
@section('title-center')
    <span ng-click="FormService.create()">добавить</span>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        @include('yachts._form')
    </div>
</div>
@stop
