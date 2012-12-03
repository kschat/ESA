(function($) {
	
	var TopNavView = function(e) {
		this.element = e;
		this.eventHandler = new EventEmitter();
	}
	
	TopNavView.prototype = {
		addAction:	function(selector, event, action) {
			var temp = (this.element.find(selector));
			temp.on(event, function(event) {
				action();
			});
		}
	};
	
	
	$(document).ready(function() {
		var topNav = new TopNavView($('#topNavLinks'));
		topNav.addAction('#link1', 'click', function() {
			
		});
	});

	$.modal('<div><p>TEST</p></div>');
})(jQuery.noConflict());