//Filename: router.js

define([
    'views/home',
    'views/user',
    'views/company',
    'views/category',
    'views/group',
    'views/vehical'


], function(home, user, company,category,group,vehical) {
    var app = {};

    app.Router = Backbone.Router.extend({
        routes: {
            '': 'home',
            'users': 'user',
            'company': 'company',
            'company/edit/:id': 'company',
            'category': 'category',
            'group': 'group',
            'vehical': 'vehical'
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
        category: function(){
            category.render();
        },
         group: function(){
            group.render();
        },
         vehical: function(){
            vehical.render();
        }
    });
    return app;
});