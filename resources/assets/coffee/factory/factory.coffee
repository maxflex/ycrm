angular.module('Yachts')
    .value 'Published', [
        {id:0, title: 'не опубликовано'},
        {id:1, title: 'опубликовано'},
    ]
    .value 'YesNo', [
        {id:0, title: 'нет'},
        {id:1, title: 'да'},
    ]
    .value 'UpDown', [
        {id: 1, title: 'вверху'},
        {id: 2, title: 'внизу'},
    ]
