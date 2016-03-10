var app = angular.module("app", ["firebase"]);

$(window).load(function() {
	updatePoll();
});

var updatePoll = function() {
	angular.element($('.main')).scope().loadPoll();
	setTimeout(updatePoll, 30000);
}

var vote = function(e) {
	var id = String(e.id);
	if (angular.element($('.main')).scope().vote(parseInt(id.substring(5, id.length)))) {
		$(e).addClass("voted");
	}
};

