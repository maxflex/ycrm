<h4 style='margin-top: 0'>Общие технические характеристики</h4>
<div class="row mb">
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'название яхты', 'model' => 'name'])
    </div>
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'стоимость аренды', 'model' => 'price'])
    </div>
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'местоположение', 'model' => 'location'])
    </div>
</div>
<div class="row mb">
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'кол-во человек (гости)', 'model' => 'guests_capacity'])
    </div>
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'кол-во человек (персонал)', 'model' => 'staff_capacity'])
    </div>
    <div class="col-sm-4">
        <label class="no-margin-bottom label-opacity">обязателен шкипер/матросы</label>
        <ng-select-new model='FormService.model.skipper_required' object="YesNo" label="title" convert-to-number></ng-select-new>
    </div>
</div>

<h4 style='margin: 40px 0 10px'>Мотор</h4>
<div class="row mb">
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'двигатель', 'model' => 'engine'])
    </div>
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'мощность', 'model' => 'power'])
    </div>
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'кол-во моторов', 'model' => 'motors'])
    </div>
</div>
<div class="row mb">
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'максимальная скорость', 'model' => 'max_speed'])
    </div>
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'крейсерская скорость', 'model' => 'cruising_speed'])
    </div>
    <div class="col-sm-4">
        @include('modules.input', ['title' => 'расход топлива (запас хода)', 'model' => 'fuel_consumption'])
    </div>
</div>


<h4 style='margin: 40px 0 10px'>Размеры</h4>
<div class="row mb flex-list">
    <div>
        @include('modules.input', ['title' => 'габаритная длина', 'model' => 'length'])
    </div>
    <div>
        @include('modules.input', ['title' => 'ширина (бимс)', 'model' => 'width'])
    </div>
    <div>
        @include('modules.input', ['title' => 'осадка', 'model' => 'draught'])
    </div>
    <div>
        @include('modules.input', ['title' => 'объем баков для воды', 'model' => 'water_capacity'])
    </div>
    <div style='margin: 0'>
        @include('modules.input', ['title' => 'объем топливного бака', 'model' => 'gas_capacity'])
    </div>
</div>


<h4 style='margin: 40px 0 10px'>Общие</h4>
<div class="row mb">
    <div class="col-sm-3">
        <label class="no-margin-bottom label-opacity">тип судна</label>
        <ng-select-new model='FormService.model.type' object='{{ jsonOptions(\App\Models\Yacht::TYPES) }}' label="title" convert-to-number></ng-select-new>
    </div>
    <div class="col-sm-3">
        <label class="no-margin-bottom label-opacity">корпус</label>
        <ng-select-new model='FormService.model.body' object='{{ jsonOptions(\App\Models\Yacht::BODIES) }}' label="title" convert-to-number></ng-select-new>
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'год постройки', 'model' => 'year'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'кол-во спальных мест', 'model' => 'beds'])
    </div>
</div>
<div class="row mb">
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'кол-во кают', 'model' => 'cabins'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'кол-во кают для экипажа', 'model' => 'staff_cabins'])
    </div>
    <div class="col-sm-3">
        @include('modules.input', ['title' => 'гальюн (туалет)', 'model' => 'toilets'])
    </div>
</div>

<div ng-show="FormService.model.type == 2">
    <h4 style='margin: 40px 0 10px'>Паруса и такелаж</h4>
    <div class="row mb flex-list">
        <div>
            @include('modules.input', ['title' => 'грот', 'model' => 'grot'])
        </div>
        <div>
            @include('modules.input', ['title' => 'генуя', 'model' => 'genuya'])
        </div>
        <div>
            @include('modules.input', ['title' => 'спинакер', 'model' => 'spinaker'])
        </div>
        <div>
            @include('modules.input', ['title' => 'генакер', 'model' => 'genaker'])
        </div>
        <div style='margin: 0'>
            @include('modules.input', ['title' => 'ловушка грота', 'model' => 'grot_trap'])
        </div>
    </div>
</div>

<div class="row mb">
    <div class="col-sm-12">
        @include('modules.input', ['title' => 'описание яхты', 'model' => 'description', 'textarea' => true])
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
</div>