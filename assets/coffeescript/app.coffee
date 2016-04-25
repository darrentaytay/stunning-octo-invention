skyApp = angular.module 'skyApp', ['ngRoute']

skyApp.controller 'UserListCtrl', ($scope, $location, userService)->

    $scope.users = window.users

    $scope.newUser = ()->
      $scope.users.push { firstName: '', lastName: '' }

    $scope.saveUsers = ()->
      userService.saveUsers $scope.users

skyApp.config ['$routeProvider',
  ($routeProvider)->

    $routeProvider.
      when('/', {
        templateUrl: 'partials/user-list.html'
        controller: 'UserListCtrl'
      })
]

skyApp.service(
    "userService",
    ( $http, $q )->

        return {
            saveUsers: (users)->
              $http {
                method: "post"
                url: "user/save"
                data: users
            }
        }
)