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

        function loadUserCredentials() {
            var token = window.localStorage.getItem(LOCAL_TOKEN_KEY);
            if (token) {
                useCredentials(token);
            }
        }

        function storeUserCredentials(token) {

            console.log('token: '+token);
            window.localStorage.setItem(LOCAL_TOKEN_KEY, token);
            useCredentials(token);
        }

        function useCredentials(token) {
            username = token.split('.')[0];

            console.log('name: '+username);

            isAuthenticated = true;
            authToken = token;
            console.log('authToken: '+authToken)
            username = 'admin';

            if (username == 'admin') {
                role = USER_ROLES.admin
            }
            if (username == 'user') {
                role = USER_ROLES.public
            }

            // Set the token as header for your requests!
            $http.defaults.headers.common['X-Auth-Token'] = token;
        }

        function destroyUserCredentials() {
            authToken = undefined;
            username = '';
            isAuthenticated = false;
            $http.defaults.headers.common['X-Auth-Token'] = undefined;
            window.localStorage.removeItem(LOCAL_TOKEN_KEY);
        }

        var login = function(name, pw) {

            return $q(function(resolve, reject) {

                //var link = 'http://lockdrnot.local.com/api/authenticate';
                var link = '';

                //link = 'http://lockedornot-jolitagrazyte.c9users.io/api/authenticate';
                link = 'http://lockedornot.jolitagrazyte.com/api/authenticate';

                $http.post(link, { email: name, password: pw })

                    .then(function (res){

                        var token = res.data.token;
                        //$scope.response = res.data;
                        console.log('token 1: '+token);

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

        return {
            login: login,
            logout: logout,
            isAuthorized: isAuthorized,
            isAuthenticated: function() {return isAuthenticated;},
            username: function() {return username;},
            role: function() {return role;}
        };
    });