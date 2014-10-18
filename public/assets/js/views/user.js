//Filename: views user.js

define([
	'text!template/user.html'
], function(usertemplate) {

	var view = Backbone.View.extend({
		el: '#page-wrapper',
		render: function() {
			func.getData({
				url: '',
				
			})
			this.$el.html(usertemplate);
		}
	});

	return view;

});