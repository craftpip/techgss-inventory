//Filename: views home.js

define([
	'text!template/home.html'
], function(hometemplate) {

	var home = Backbone.View.extend({
		el: '#wrapper',
		render: function() {
			this.$el.html(hometemplate);
		}
	});
	return home;

});