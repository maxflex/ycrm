angular.module('Yachts')
    .factory 'Yacht', ($resource) ->
        $resource apiPath('yachts'), {id: '@id'}, updatable()
    .factory 'Tag', ($resource) ->
        $resource apiPath('tags'), {id: '@id'},
                update:
                    method: 'PUT'
                autocomplete:
                    method: 'GET'
                    url: apiPath('tags', 'autocomplete')
                    isArray: true

    .factory 'Page', ($resource) ->
        $resource apiPath('pages'), {id: '@id'},
            update:
                method: 'PUT'
            checkExistance:
                method: 'POST'
                url: apiPath('pages', 'checkExistance')
    .factory 'Photo', ($resource) ->
        $resource apiPath('photos'),
            id: '@id'
            photo: '@photo'
        , delete:
            method: 'DELETE'

apiPath = (entity, additional = '') ->
    "api/#{entity}/" + (if additional then additional + '/' else '') + ":id"


updatable = ->
    update:
        method: 'PUT'
countable = ->
    count:
        method: 'GET'
