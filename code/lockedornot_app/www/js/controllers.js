
angular.module('starter')

.controller('AppCtrl', function($state, $scope, $ionicPopup, AuthService, AUTH_EVENTS){
    $scope.username = AuthService.username();
    console.log($scope.username);

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

            console.log(data);

            AuthService.login(data.username, data.password).then(function(authenticated) {

                //console.log('authenticated: '+authenticated);
                $state.go('main.dash', {}, {reload: true});
                //$scope.setCurrentUsername(data.username);
                $scope.setCurrentUsername('admin');

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

        $scope.logout = function() {
            AuthService.logout();
            $state.go('login');
        };




        //
        //$scope.performValidRequest = function() {
        //    $http.get('http://localhost:8100/valid').then(
        //        function(result) {
        //            $scope.response = result;
        //        });
        //};
        //
        //$scope.performUnauthorizedRequest = function() {
        //    $http.get('http://localhost:8100/notauthorized').then(
        //        function(result) {
        //            // No result here..
        //        }, function(err) {
        //            $scope.response = err;
        //        });
        //};
        //
        //$scope.performInvalidRequest = function() {
        //    $http.get('http://localhost:8100/notauthenticated').then(
        //        function(result) {
        //            // No result here..
        //        }, function(err) {
        //            $scope.response = err;
        //        });
        //};
    });

    //.controller('PublicCtrl', ['$http', function($http) {

    //this.dataItems = ['a', 'b', 'c'];

    //var items = this;

    //this.proceed = function(){
    //
    //    $http.jsonp('http://en.wikipedia.org/w/api.php?action=opensearch&search='+this.query+'&limit=25&format=json&callback=JSON_CALLBACK').success(function(data) {
    //
    //
    //        items.toShow = [];
    //
    //        for(item in data[1]){
    //
    //            items.toShow.push({
    //
    //                name: data[1][item],
    //                link: data[3][item]
    //
    //            });
    //        }
    //
    //    });
    //    console.log(items.toShow);
    //
    //    console.log( items.toShow.length );
    //
    //};

    //}]);
