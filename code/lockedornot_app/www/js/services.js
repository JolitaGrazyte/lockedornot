/**
 * Created by jolita_pabludo on 05/12/15.
 */
angular.module('starter')

    .service('AuthService', function($q, $http) {
        var LOCAL_TOKEN_KEY = 'yourTokenKey';
        var username = '';
        var isAuthenticated = false;
        //var role = '';
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
        function loadUsername(){
            var locked = window.localStorage.getItem(username);
            //console.log('car state: '+res+ ' so it\'s locked' );
            useUsername(username);
        }

        function useResult(locked){
            isLocked = locked;
        }

        function useUsername(full_name){
            username = full_name;
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

        function storeUsername(full_name){
            window.localStorage.setItem(username, full_name);
            username = full_name;
            useUsername(full_name);
        }

        function useCredentials(token) {

            isAuthenticated = true;
            authToken = token;
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

                //var link = 'http://lockdrnot.local.com/api/authenticate';
                //var link = '';
                //var link = 'http://lockedornot-jolitagrazyte.c9users.io/api/authenticate';
                var link = 'http://lockedornot.jolitagrazyte.com/api/authenticate';

                $http.post(link, { email: name, password: pw })

                    .then(function (res){

                        //console.log(res.data);
                        var token = res.data.token;
                        //$scope.response = res.data;
                        //console.log('token 1: '+token);

                        storeUserCredentials(token);
                        //alert('Login success.');
                        resolve('Login success.');


                    }), function(err) {
                    console.error('ERR', err);
                    reject('Login Failed.');
                    alert('Sorry there were some problems. Your login failed.');
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

                //var link = 'http://lockdrnot.local.com/api/lockedornot';
                //var link = 'http://lockedornot-jolitagrazyte.c9users.io/api/lockedornot';
                var  link = 'http://lockedornot.jolitagrazyte.com/api/lockedornot';

                //console.log('got token: ' + token);

                $http.get(link + '?token=' + token)

                    .then(function (res) {

                        console.log(res.data.username);

                        storeResult(res.data.state);
                        storeUsername(res.data.username);

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
        loadUsername();

        return {
            car_state: function(){ return isLocked; },
            login: login,
            logout: logout,
            isAuthorized: isAuthorized,
            isAuthenticated: function() {return isAuthenticated;},
            username: function() {return username;},
            //role: function() {return role;}
        };
    });