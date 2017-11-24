@extends('app')
@section('title', 'Яхты')
@section('controller', 'YachtsIndex')

@section('title-right')
    {{ link_to_route('yachts.create', 'добавить яхту') }}
@endsection

@section('content')
    <table class="table">
        <tr ng-repeat="model in IndexService.page.data">
            <td>
                <a href='yachts/@{{ model.id }}/edit'>@{{ model.name }}</a>
            </td>
            <td>
                @{{ model.desc }}
            </td>
        </tr>
    </table>
    @include('modules.pagination')
@stop
