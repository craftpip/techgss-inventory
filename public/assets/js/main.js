// Filename: main.js

require.config({
    paths: {
        jquery: 'libs/jquery',
        underscore: 'libs/underscore.min',
        backbone: 'libs/backbone.min'
    }
});

require([
    'init'
], function (app) {
    
    app.start(); //setup the page and start backbone history.
    
});