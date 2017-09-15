var app = angular.module('resume', [])

app.controller('ResumeController', ['$scope', '$http', function controller ($scope, $http) {
  $http.get('resume.json').then(function (response) {
    $scope.resume = response.data
  })
}])
