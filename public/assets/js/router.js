//Filename: router.js

define([
    'views/home',
    'views/user',
    'views/company',
    'views/vehical',
    'views/category',
    'views/group',
], function(home, user, company, vehical, category, group) {
    var app = {};

    app.Router = Backbone.Router.extend({
        routes: {
            '': 'home',
            'users': 'user',
            'company': 'company',
            'company/edit/:id': 'company',
            'category': 'category',
            'category/edit/:id': 'category',
            'group': 'group',
            'group/edit/:id': 'group',
            'vehical': 'vehical',
            'vehical/edit/:id': 'vehical'
        },
        home: function() {
            home.render();
        },
        user: function() {
            user.render();
        },
        company: function(id){
            company.render(id);
        },
        vehical: function(id){
            vehical.render(id);
        },
         group: function(id){
            group.render(id);
        },
        category: function(id){
            category.render(id);
        }
    });
    return app;
});