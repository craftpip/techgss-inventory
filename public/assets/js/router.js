//Filename: router.js

define([
    'views/home',
    'views/user',
    'views/company',
    'views/vehical',
    'views/category',
    'views/group',
    'views/item',
    'views/sale',
    'views/purchase',
], function(home, user, company, vehical, category, group, item, sale,purchase) {
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
            'vehical/edit/:id': 'vehical',
            'item': 'item',
            'sale/:type': 'sale',
            'sale/:type/:id': 'sale',
            'purchase/:type': 'purchase',
            'purchase/:type/:id': 'purchase',
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
        },
        item: function(id){
            item.render(id);
        },
        sale: function(type,id){
            sale.render(type,id);
        },
        purchase: function(type,id){
            purchase.render(type,id);
        }
    });
    return app;
});