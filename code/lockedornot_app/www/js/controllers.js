
angular.module('starter')

.controller('AppCtrl', function($state, $scope, $ionicPopup, AuthService, AUTH_EVENTS){
    $scope.username = AuthService.username();
    //console.log($scope.username);

    $scope.$on(AUTH_EVENTS.notAuthorized, function(event) {
        var alertPopup = $ionicPopup.alert({
            title: 'Unauthorized!',
            template: 'You are not allowed to access this resource.'
        });
    });

    $scope.$on(AUTH_EVENTS.notAuthenticated, function(event) {
        AuthService.logout();
        $state.go('login');
        var alertPopup = $ionicPopup.alert({
            title: 'Session Lost!',
            template: 'Sorry, You have to login again.'
        });
    });

    $scope.setCurrentUsername = function(name) {
        $scope.username = name;
    };

})

    .controller('LoginCtrl', function($scope, $state, $ionicPopup, AuthService) {
        $scope.data = {};
        $scope.login = function(data) {

            //console.log(data);

            AuthService.login(data.username, data.password).then(function(authenticated) {

                //console.log('authenticated: '+authenticated);
                $state.go('main.dash', {}, {reload: true});
                $scope.setCurrentUsername(AuthService.username());
                //$scope.setCurrentUsername('admin');

            }, function(err) {

                var alertPopup = $ionicPopup.alert({
                    title: 'Login failed!',
                    template: 'Please check your credentials!'
                });
            });
        };
    })

    .controller('DashCtrl', function($scope, $state, $http, $ionicPopup, AuthService) {

        $scope.getState = function(){
            //console.log('car state: '+$scope.state);
            return AuthService.car_state();
        };

        $scope.getUsername = function(){

            return AuthService.username();
        };

        $scope.logout = function() {
            AuthService.logout();
            $state.go('login');
        };



    });

