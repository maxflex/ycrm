angular
    .module 'Yachts'
    .config (ngImageGalleryOptsProvider) ->
        ngImageGalleryOptsProvider.setOpts
            thumbnails: true
            inline    : false
            imgBubbles: false
            bgClose   : true
            imgAnim   : 'fadeup'
    .controller 'YachtsIndex', ($scope, $attrs, IndexService, Yacht) ->
        bindArguments($scope, arguments)
        angular.element(document).ready ->
            IndexService.init(Yacht, $scope.current_page, $attrs)

    .controller 'YachtsForm', ($scope, $attrs, $timeout, FormService, Yacht, PhotoService, YesNo) ->
        bindArguments($scope, arguments)
        angular.element(document).ready ->
            FormService.init(Yacht, $scope.id, $scope.model)

        $scope.$watchCollection 'FormService.model.photos', (newVal, oldVal) ->
            $scope.images = PhotoService.getImages() if newVal isnt undefined
