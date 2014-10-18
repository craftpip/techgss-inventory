//global helper functions

$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
    options.url = window.base + options.url;
});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function error() {
    noty({
        text: 'Sorry, either you\'ve been logged out or there is a problem at the server, please refresh the page.',
        type: 'error',
        layout: 'bottomCenter'
    });
}

var func = {};

func.getView = function (which, callBack) {
    console.info('get view function is used');
    $.get('api/getPage/' + which, function (d) {
        d ? callBack(d) : error();
    });
};

func.getData = function (url, callBack) {
    $.get('' + url, function (d) {
        d ? callBack(d) : error();
    });
};

func.setPageHeight = function () {
    $('#page-wrapper').css('min-height', $(window).height() - 0 + 'px');
};

func.setTitle = function (that) {
    document.title = that.title + " | " + window.title;
};

func.buildOptions = function (d, value, name) {
    var html = '';
    for (var i in d) {
        html += '<option value="' + d[i][value] + '">' + d[i][name] + '</option>';
    }
    return html;
};

func.renderCurrent = function () {
    app.router.navigate(location.hash, {trigger: true});
};

func.get_SelectOptionValueFromString = function (arg) {
    if (typeof (arg) == 'object') {
        var a = [];
        for (var i = 0; i < arg.length; i++) {
            for (var j = 0; j < $('option').length; j++) {
                if (arg[i] == $('option').eq(j).html()) {
                    a.push($('option').eq(j).attr('value'));
                }
            }
        }
        return a;
    } else {
        for (var i = 0; i < $('option').length; i++) {
            if (arg == $('option').eq(i).html()) {
                return $('option').eq(i).attr('value');
            }
        }
    }
};

func.bindPlugins = function (arg) {
    if ($('[data-toggle=tooltip]').length != 0) {
        $('[data-toggle=tooltip]').tooltip();
    }
    if ($("[data-toggle=popover]").length != 0) {
        $("[data-toggle=popover]").popover();
    }
    if ($('table#data-table').length != 0) {

        window.tableasd = $('table#data-table').DataTable();

    }
    if ($('.selectpicker').length != 0) {
        if (arg == 'refresh') {
            $('.selectpicker').selectpicker('refresh');
        } else {
            $('.selectpicker').selectpicker();
            $('.selectpicker').selectpicker('refresh');
        }
    }
    if ($('.datepicker').length != 0) {
        $('.datepicker').datepicker();
    }
};

func.submitForm = function (url, data, action) {
    $.ajax({url: url, type: "POST", data: data,
                success: function (data, textStatus, jqXHR) {
            action.success(data, textStatus, jqXHR);        
        },
                error: function (jqXHR, textStatus, errorThrown) {        
            action.error(jqXHR, textStatus, errorThrown);        
        }    
    });
};

func.cleanUnderscoreTemplate = function (tem) {
    while (tem.indexOf('&lt;') != '-1') {
        tem = tem.replace('&lt;', '<');
    }
    while (tem.indexOf('&gt;') != '-1') {
        tem = tem.replace('&gt;', '>');
    }
    return tem;
};

func.confirm = function (arg) {
    var html = '<div class="confirmModel" style="display:none"><div class="confirmModel-overlay"></div><div class="container"><div class="col-md-6 col-md-offset-3"><div style="height:200px"></div><div class="ninja-hide panel panel-primary"><div class="panel-heading"><span id="title">example.</span></div><div class="panel-body"><span id="content"><p>This is the body</p></span></div><div class="panel-footer"><div class="btn-group btn-group-justified"><a type="a" id="y" class="btn btn-primary btn-default"><i class="fa fa-check"></i> Okay</a><a type="a" id="n" class="btn btn-default">cancel</a></div></div></div></div></div></div>';
    if ($('.confirmModel').length != 0) {
        $('.confirmModel').remove();
    }
    $('body').append(html);
    $('.confirmModel #title').html(arg.title);
    $('.confirmModel #content').html(arg.content);
    window.confirm = arg;

    $('.confirmModel #y').click(function (e) {
        try {
            arg.success(arg.data || '');
        } catch (e) {
        }
        $('.confirmModel a').unbind();
        $('.confirmModel').fadeOut('fast');
        window.confirm = undefined;
    });
    $('.confirmModel #n').click(function (e) {
        try {
            arg.error();
        } catch (e) {
        }
        $('.confirmModel a').unbind();
        $('.confirmModel').fadeOut('fast');
        window.confirm = undefined;
    });
    $('.confirmModel').show('fast', function () {
        $('.confirmModel .ninja-hide').removeClass('ninja-hide');
    });
};

func.Settings = {
    defaults: {
        theme: 'default',
        fontsize: 14
    },
    init: function () {
        if (localStorage.getItem('nb-settings') == undefined || localStorage.getItem('nb-settings') == null) {
            localStorage.setItem('nb-settings', JSON.stringify(this.defaults));
            console.log('saved defaults');
        } else {
            console.log('loading saved');
            this.apply();
        }
    },
    show: function () {
        var a = JSON.parse(localStorage.getItem('nb-settings'));
        for (var i in a) {
            $('#page-settings [name="' + i + '"]').val(a[i]);
        }
        func.bindPlugins('refresh');
        $('.settingsModel').fadeIn(200);
    },
    hide: function () {
        $('.settingsModel').hide();
    },
    save: function (ar) {
        var s = JSON.stringify($('#page-settings').serializeObject());
        localStorage.setItem('nb-settings', s);
        this.hide();
        if (ar == 'reload') {
            location.reload();
        } else {
            noty({
                text: 'please reload the page for changes to apply'
            });
        }
    },
    apply: function () {
        var a = JSON.parse(localStorage.getItem('nb-settings'));
        if (!(a.theme == 'bootstrap.min')) {
            $('head').append('<link type="text/css" rel="stylesheet" href="../assets/css/administrator/' + a.theme + '.css">');
        }
        $('body').css('font-size', a.fontsize + 'px');
    }
};

func.filterObject = function (e, value, key) {
    var c = [];
    var key;
    for (var i in e) {
        if (e[i][value] == key) {
            c.push(e[i]);
        }
    }
    return func.toObject(c);
};

func.toObject = function (arr) {
    var rv = {};
    for (var i = 0; i < arr.length; ++i)
        if (arr[i] !== undefined)
            rv[i] = arr[i];
    return rv;
};

func.saveZones = function () {
    if (func.storage.get('zonedata') == undefined) {
        $.get('api/getCircleZone', function (e) {
            func.storage.set('zonedata', e);
        });
    }
};

func.storage = {
    set: function (arg, v) {
        if (v == 'object') {
            var v = JSON.stringify(v);
            console.log(v);
        }
        localStorage.setItem(arg, v);
    },
    get: function (arg) {
        var a = localStorage.getItem(arg);
        try {
            if (a.charAt(0) == '{' || a.charAt(0) == '[') {
                a = JSON.parse(a);
            }
        } catch (e) {
        }
        if (a == undefined || a == null) {
            a == undefined;
        }
        return a;
    },
    clear: function () {
        localStorage.removeItem('zonedata');
        localStorage.removeItem('nb-settings');
        noty({
            text: 'Cache is Cleared!'
        })
    }
};

func.trimHyphens = function (arg) {
    if (arg.charAt(arg.length - 1) == '-') {
        arg = arg.substring(0, arg.length - 1);
    }
    return arg;
};

func.cellEdit = {
    html: {
        select: function (val) {
            return '<select class="form-control cellEditSelectPicker cellEditBox" data-initval="' + val + '"></select>';
        },
        input: function (val) {
            return '<input type="text" class="form-control cellEditBox" data-initval="' + val + '" value="' + val + '">';
        },
        textarea: function (val) {
            return '<textarea class="form-control cellEditBox" data-initval="' + val + '" >' + val + '</textarea>';
        }
    },
    init: function (e) {
        $this = $(e.currentTarget);
        if (!$this.hasClass('editActive')) {
            $this.prepend(this.html[$this.data('control')]($this.html()));
            var $control = $this.find($this.data('control'));
            if ($this.data('control') == 'select') {
                $.get($this.data('from'), function (a) {
                    a = JSON.parse(a);
                    console.log('name: ' + $this.data('select-name') + ', value: ' + $this.data('select-value'));
                    console.log('JSON data received:');
                    var html = func.buildOptions(a, $this.data('select-value'), $this.data('select-name'));
                    $control.html(html);
                    $control.val($this.data('value'));
                });
            }
            $this.addClass('editActive');
            $control.focus();
            $control.css({
                'margin-top': '-8px',
                position: 'absolute',
                width: '0px'
            });
            $control.css({
                'margin-left': '-20px',
                width: ($this.width() + 50) + 'px',
            });
            $control.addClass('anim-hide');
            setTimeout(function () {
                $control.addClass('anim-2');
                $control.removeClass('anim-hide');
            }, 200);
        }
    },
    close: function (e) {
        // return false;
        $this = $(e.currentTarget);
        $p = $this.parents('td.editActive');
        console.log(e.which);
        if (e.which == 27 || e.which == 0) {
            if ($this.val() == $this.data('initval')) {
                console.log('same content');
            } else {
                $parent = $this.parents('tr');
                var url = $parent.data('url');
                var ob = {};
                ob['id'] = $parent.data('id');
                ob[$this.parents('td').data('name')] = $this.val();
                $.post(url, ob, function (e) {
                    try {
                        e = JSON.parse(e);
                    } catch (e) {
                        console.error('The source did not return a Valid JSON string');
                        return false;
                    }

                    noty({
                        text: e.reason,
                        type: e.status ? 'success' : 'error'
                    });
                });
            }
            $p.data('value', $this.val());
            $p.html($this.val());
            $p.removeClass('editActive');
        }
    }
};

func.cleanMenu = function () {
    var $li = $('#side-menu > li');
    $.each($li, function (i) {
        if ($(this).find('ul.nav').length > 0) {
            if ($(this).find('ul.nav li').length == 0) {
                $(this).remove();
            }
        }
    });
};