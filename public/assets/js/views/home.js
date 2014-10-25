//Filename: views home.js

define([
	'text!template/home.html'
], function(hometemplate) {

	var home = Backbone.View.extend({
		el: '#page-wrapper',
		render: function() {
			this.$el.html(hometemplate);
		}
	});

	window.home = window.home || new home();
	return window.home;

});