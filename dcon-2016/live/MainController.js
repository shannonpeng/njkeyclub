app.controller('MainController', function($scope, $firebaseArray) {

	var poll = new Firebase("//njdcon2016.firebaseio.com/spirit");
	var friday = new Firebase("//njdcon2016.firebaseio.com/schedule/friday");
	var saturday = new Firebase("//njdcon2016.firebaseio.com/schedule/saturday");
	var sunday = new Firebase("//njdcon2016.firebaseio.com/schedule/sunday");
	$scope.poll = $firebaseArray(poll);

	$scope.friday = $firebaseArray(friday);
	$scope.saturday = $firebaseArray(saturday);
	$scope.sunday = $firebaseArray(sunday);
	
});