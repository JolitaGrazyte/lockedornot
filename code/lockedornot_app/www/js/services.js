/**
 * Created by jolita_pabludo on 05/12/15.
 */
angular.module('starter')

    .service('AuthService', function($q, $http, USER_ROLES) {
        var LOCAL_TOKEN_KEY = 'yourTokenKey';
        var username = '';
        var isAuthenticated = false;
        var role = '';
        var authToken;
        var isLocked = false;

        function loadUserCredentials() {
            var token = window.localStorage.getItem(LOCAL_TOKEN_KEY);
            if (token) {
                useCredentials(token);
            }
        }

        function loadResult(){
            var locked = window.localStorage.getItem(isLocked);
            //console.log('car state: '+res+ ' so it\'s locked' );
            useResult(locked);
        }

        function useResult(locked){
            isLocked = locked;
        }

        function storeUserCredentials(token) {

            //console.log('token: '+token);
            window.localStorage.setItem(LOCAL_TOKEN_KEY, token);

            useCredentials(token);
        }

        function storeResult(res){

            window.localStorage.setItem(isLocked, res);
            isLocked = res;
            useResult(res);

        }

        function useCredentials(token) {
            //username = token.split('.')[0];

            //console.log('name: '+username);

            isAuthenticated = true;
            authToken = token;

            //console.log('authToken: '+authToken);
            username = 'admin';

            if (username == 'admin') {
                role = USER_ROLES.admin
            }
            if (username == 'user') {
                role = USER_ROLES.public
            }

            // Set the token as header for your requests!
            $http.defaults.headers.common['X-Auth-Token'] = token;

            getCarState();
        }

        function destroyUserCredentials() {
            authToken = undefined;
            username = '';
            isLocked = false;
            isAuthenticated = false;
            $http.defaults.headers.common['X-Auth-Token'] = undefined;
            window.localStorage.removeItem(LOCAL_TOKEN_KEY);
            window.localStorage.removeItem(isLocked);
        }

        var login = function(name, pw) {

            return $q(function(resolve, reject) {

                var link = 'http://lockdrnot.local.com/api/authenticate';
                //var link = '';
                //link = 'http://lockedornot-jolitagrazyte.c9users.io/api/authenticate';
                //link = 'http://lockedornot.jolitagrazyte.com/api/authenticate';

                $http.post(link, { email: name, password: pw })

                    .then(function (res){

                        var token = res.data.token;
                        //$scope.response = res.data;
                        //console.log('token 1: '+token);

                        storeUserCredentials(token);
                        alert('Login success.');
                        resolve('Login success.');


                    }), function(err) {
                    console.error('ERR', err);
                    reject('Login Failed.');
                    alert('Login Failed.');
                    // err.status will contain the status code
                };
            });
        };



        var getCarState = function(){

            var token = window.localStorage.getItem(LOCAL_TOKEN_KEY);

            //console.log('window.token '+token);

            return $q(function(resolve, reject) {

                //var token = $http.defaults.headers.common['X-Auth-Token']

                //console.log($http.defaults.headers.common['X-Auth-Token']);

                var link = 'http://lockdrnot.local.com/api/lockedornot';
                //link = 'http://lockedornot-jolitagrazyte.c9users.io/api/lockedornot';
                //link = 'http://lockedornot.jolitagrazyte.com/api/authenticatlockedornot

                //console.log('got token: ' + token);

                $http.get(link + '?token=' + token)

                    .then(function (res) {

                        console.log(res);
                        storeResult(res.data.state);

                        //console.log('car state: '+result+ ' so it\'s locked' );

                    }), function (err) {
                    console.error('ERR', err);
                    reject('Failed to get result.');
                    alert('Failed to get result.');
                    // err.status will contain the status code
                };

            });

        };


        var logout = function() {
            destroyUserCredentials();

        };

        var isAuthorized = function(authorizedRoles) {
            if (!angular.isArray(authorizedRoles)) {
                authorizedRoles = [authorizedRoles];
            }
            return (isAuthenticated && authorizedRoles.indexOf(role) !== -1);
        };

        loadUserCredentials();
        loadResult();

        return {
            car_state: function(){ return isLocked; },
            login: login,
            logout: logout,
            isAuthorized: isAuthorized,
            isAuthenticated: function() {return isAuthenticated;},
            username: function() {return username;},
            role: function() {return role;}
        };
    });