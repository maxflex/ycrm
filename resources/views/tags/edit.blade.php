@extends('app')
@section('title', 'Редактирование тэга')
@section('title-center')
    <span ng-click="FormService.edit()">сохранить</span>
@stop
@section('title-right')
    <span ng-click="FormService.delete($event)">удалить тэг</a>
@stop
@section('content')
@section('controller', 'TagsForm')
<div class="row">
    <div class="col-sm-12">
        @include('tags._form')
    </div>
</div>
@stop
