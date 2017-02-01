@extends('app')
@section('title', 'Редактирование яхты')
@section('title-center')
    <span ng-click="FormService.edit()">сохранить</span>
@stop
@section('title-right')
    <span ng-click="FormService.delete($event)">удалить яхту</a>
@stop
@section('content')
@section('controller', 'YachtsForm')
<div class="row">
    <div class="col-sm-12">
        @include('yachts._form')
    </div>
</div>
@stop
