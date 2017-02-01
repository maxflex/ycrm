<div class="row mb">
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'название яхты', 'model' => 'title'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'вместимость', 'model' => 'capacity'])
    </div>
</div>
<div class="row mb">
    <div class="col-sm-6">
        @include('modules.input', ['title' => 'описание яхты', 'model' => 'desc', 'textarea' => true])
    </div>
</div>

{{-- @include('docs.commands') --}}
