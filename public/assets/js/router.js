//Filename: router.js

define([
    'views/home',
    'views/user'
], function(home, user) {
    var app = {};

    app.Router = Backbone.Router.extend({
        routes: {
            '': 'home',
            'users': 'user'
        },
        home: function() {
            var Home = new home();
            Home.render();
        },
        user: function() {
            var User = new user();
            User.render();
        }
    });

    return app;

});