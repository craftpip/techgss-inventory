define([
], function () {
    var Router = Backbone.Router.extend({
        routes: {
            '': 'asd',
            'asd': 'dsa'
        },
        asd: function (e) {
            alert('asd')
        },
        dsa: function (e) {
            
        }
    });

    var init = function () {
        var router = new Router();
        Backbone.history.start();
    }

    return {
        init: init
    };
});