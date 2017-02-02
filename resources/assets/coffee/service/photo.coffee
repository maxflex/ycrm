angular.module 'Yachts'
    .service 'PhotoService', ($http, Photo, FileUploader, FormService) ->
        this.Uploader = new FileUploader
            url: 'api/photos'
            alias: 'photos'
            filters: [
                name: 'imageFilter',
                fn: (file, options) ->
                    type = "|#{file.type.slice(file.type.lastIndexOf('/') + 1)}|"
                    '|jpg|png|jpeg|bmp|gif|'.indexOf(type) isnt -1
            ]
            autoUpload: true
            removeAfterUpload: true

        this.Uploader.onBeforeUploadItem = (item) ->
            item.formData.push
                yacht_id: scope.id

        this.Uploader.onSuccessItem = (item, response) ->
            FormService.model.photos = [] if not FormService.model.photos
            FormService.model.photos.push response

        this.delete = (photo) ->
            Photo.delete
                id:     scope.id or 0
                photo:  photo

            FormService.model.photos = _.without FormService.model.photos, photo

        this
