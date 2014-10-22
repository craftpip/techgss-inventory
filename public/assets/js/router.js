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
            window.Home = window.Home || new home();
            Home.render();
        },
        user: function() {
            window.User = window.User || new user();
            User.render();
        }
    });

    return app;

});