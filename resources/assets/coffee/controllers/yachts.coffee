angular
    .module 'Yachts'
    .controller 'YachtsIndex', ($scope, $attrs, IndexService, Yacht) ->
        bindArguments($scope, arguments)
        angular.element(document).ready ->
            IndexService.init(Yacht, $scope.current_page, $attrs)

    .controller 'YachtsForm', ($scope, $attrs, $timeout, FormService, Yacht) ->
        bindArguments($scope, arguments)
        angular.element(document).ready ->
            FormService.init(Yacht, $scope.id, $scope.model)
