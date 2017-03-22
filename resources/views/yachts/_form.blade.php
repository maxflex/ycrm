<div class="row mb">
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'название яхты', 'model' => 'title'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'материал корпуса', 'model' => 'material'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'год выпуска', 'model' => 'year'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'длина', 'model' => 'length'])
    </div>
</div>
<div class="row mb">
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'колколичество кают', 'model' => 'cabin_count'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'количество спальных мест', 'model' => 'room_count'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'количество моторов', 'model' => 'engine_count'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'мощность моторов', 'model' => 'horse_power'])
    </div>
</div>
<div class="row mb">
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'стоимость аренды', 'model' => 'rent_price'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'цена', 'model' => 'price'])
    </div>
    {{-- <div class="col-sm-3">
        @include('modules.input', ['title' => 'количество моторов', 'model' => 'engine_count'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'мощность моторов', 'model' => 'horse_power'])
    </div> --}}
</div>
<div class="row mb">
    <div class="col-sm-12">
        @include('modules.input', ['title' => 'описание яхты', 'model' => 'desc', 'textarea' => true])
    </div>
</div>
<div id='yacht-photos'>
    <div class='row mb'>
        <div id='upload-photo' class='col-sm-3'>
            <button onclick='upload()' type="button" class='btn btn-primary' ng-disabled='PhotoService.Uploader.isUploading'>
                добавить фотографии
            </button>
            <input type='file' multiple name='photos' nv-file-select='' uploader='PhotoService.Uploader'>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ng-image-gallery images="images"></ng-image-gallery>
        </div>
    </div>
    {{-- <div id='items' class='row mb'>
        <div class="col-sm-12">
            <ul>
                <li ng-repeat='photo in FormService.model.photos track by $index'>
                    <img ng-src='storage/img/yachts/@{{ photo }}' class='img-thumbnail'>

                    <button type="button" class='btn btn-danger btn-xs' ng-click='PhotoService.delete(photo)'>удалить</button>
                </li>
            </ul>
        </div>
    </div> --}}
</div>

{{-- @include('docs.commands') --}}
