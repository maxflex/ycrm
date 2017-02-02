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
<div id='yacht-photos'>
    <div class='row mb'>
        <div id='upload-photo' class='col-sm-3'>
            <button type="button" class='btn btn-success' ng-disabled='PhotoService.Uploader.isUploading'>
                Выбрать фотографии
            </button>
            <input class='col-sm-3' id='uploader' type='file' multiple
                   name='photos'
                   nv-file-select=''
                   uploader='PhotoService.Uploader'
            />
        </div>
    </div>
    <div id='items' class='row mb'>
        <div class="col-sm-12">
            <ul>
                <li ng-repeat='photo in FormService.model.photos track by $index'>
                    <img ng-src='img/yachts/@{{ photo }}' class='img-thumbnail'>

                    <button type="button" class='btn btn-danger btn-xs' ng-click='PhotoService.delete(photo)'>удалить</button>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- @include('docs.commands') --}}
