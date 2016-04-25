skyApp = angular.module 'skyApp', ['ngRoute']

skyApp.controller 'UserListCtrl', ($scope, $location, userService)->

    $scope.users = window.users

    $scope.newUser = ()->
      $scope.users.push { firstName: '', lastName: '' }

    $scope.saveUsers = ()->
      userService.saveUsers($scope.users).then((response)->
        notie.alert 1, 'Your Users were saved successfully', 3
      , (response)->
        notie.alert 3, 'There was a problem saving your Users', 3
      )

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