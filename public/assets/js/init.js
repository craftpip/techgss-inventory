//Filename: init.js

define([
    'router'
], function (router) {
    
    var app = {};
    
    app.events = {
        loaded: false,
        load: function () {
            if (!this.loaded) {

                $(window).ajaxComplete(function () {
                    setTimeout(function () {
                        $('.page-loading').addClass('ninja-hide');
                    }, 1000);
                });

                $(window).ajaxStart(function () {

                    $('.page-loading').removeClass('ninja-hide');

                });

                $(window).resize(function () {
                    func.setPageHeight();
                });


                $(document).on('click', '.cellEdit', function (e) {
                    func.cellEdit.init(e);
                });

                $(document).on('keyup', '.cellEdit.focus', function (e) {
                    console.log(e.which);
                });

                window.cellEditblur = false;

                $(document).on('blur', 'select.cellEditBox, input.cellEditBox, textarea.cellEditBox', function (e) {
                    if (!window.cellEditblur) {
                        func.cellEdit.close(e);
                    }
                });

                $(document).on('keyup', 'select.cellEditBox, input.cellEditBox, textarea.cellEditBox', function (e) {
                    if (e.which == 27) {
                        window.cellEditblur = true;
                        func.cellEdit.close(e);
                        window.cellEditblur = false;
                    }
                });

                $(window).bind('hashchange', function () {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 400);
                });

                this.loaded = true;
            }
        }
    };

    app.start = function () {
        window.router = window.router || new router.Router();
        window.title = document.title;
        Backbone.history.start();
        func.setPageHeight();
        func.Settings.init();
        func.cleanMenu();
        setTimeout(function () {
            $('#wrapper').fadeIn();
        }, 1000);
    };
    
    return app;
});