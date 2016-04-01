app.controller('MainController', function($scope, $firebaseArray) {

	var poll = new Firebase("//njdcon2016.firebaseio.com/spirit");
	var friday = new Firebase("//njdcon2016.firebaseio.com/schedule/friday");
	var saturday = new Firebase("//njdcon2016.firebaseio.com/schedule/saturday");
	var sunday = new Firebase("//njdcon2016.firebaseio.com/schedule/sunday");
	var voted = false;
	$scope.poll = $firebaseArray(poll);

	$scope.friday = $firebaseArray(friday);
	$scope.saturday = $firebaseArray(saturday);
	$scope.sunday = $firebaseArray(sunday);

	$scope.loadPoll = function() {
		$scope.$apply(function() {
			$scope.poll.sort(function(a, b) { return parseInt(b.votes) - parseInt(a.votes)});
		})
		$("#spirit .results div").css("width", "200px");
		var totalVotes = 0;
		for (var i = 0; i < $scope.poll.length; i++) {
			totalVotes += $scope.poll[i].votes;
		}
		for (var i = 0; i < $scope.poll.length; i++) {
			var division = $scope.poll[i];
			$("#poll-" + division.number).animate({"width": 200 + division.votes / totalVotes * 1000 + "px"});
		}
	};

	$scope.vote = function(n) {
		if (voted)
			return false;
		for (var i = 0; i < $scope.poll.length; i++) {
			if ($scope.poll[i].number == n) {
				$scope.$apply(function() {
					var item = $scope.poll.$getRecord($scope.poll.$keyAt(i));
					item.votes++;
					$scope.poll.$save(item);
				});
				break;
			}
		}
		voted = true;
		return true;
	}

});