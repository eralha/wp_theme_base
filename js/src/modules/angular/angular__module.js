define(['angular'], function () {


	var app = angular.module('app', []);
	    //generic controlers go here
	    app.controller('myCtrl', ['$scope', '$rootScope', function($scope, $rootScope ) {

	        $scope.name = "Emanuel Ralha";

	    }]);
    
    angular.bootstrap(document, ['app']);

    return {module: "page doador"};

});
