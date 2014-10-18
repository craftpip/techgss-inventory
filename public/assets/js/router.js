//Filename: router.js

define([
    'views/home'
], function(homeView) {
    var app = {};

    app.Router = Backbone.Router.extend({
        routes: {
            '': 'home'
        },
        home: function() {
            var homeView = new homeView();
            console.log(homeView);
            homeView.render();
        }
    });

    return app;

});