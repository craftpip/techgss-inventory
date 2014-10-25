//Filename: router.js

define([
    'views/home',
    'views/user',
    'views/company'
], function(home, user, company) {
    var app = {};

    app.Router = Backbone.Router.extend({
        routes: {
            '': 'home',
            'users': 'user',
            'company': 'company',
            'company/edit/:id': 'company'
        },
        home: function() {
            home.render();
        },
        user: function() {
            user.render();
        },
        company: function(id){
            company.render(id);
        }
    });

    return app;

});