//Filename: boilerplate.js

define([
    'text!template/item/main.html',
    'text!template/item/addedit.html'
], function(main, itemadd) {
    var view = Backbone.View.extend({
        el: '#page-wrapper',
        events: {
            'click .vehical-btn-delete': 'delete',
            'submit #vehical-create-new-vehical': 'submit'
        },
        render: function(edit) {
            this.$el.html(main);
            // this.rendervehicallist();
            this.renderitemAddEdit(edit);
        },
        renderitemAddEdit: function(id) {
            if (id) {

            } else {
                var category;
                
                $.get("api/category/i", function(data) {
                    data = $.parseJSON(data);
                    $.each(data, function(index, value) {
                         console.log(value.category_id);
                    });
                });
                
                 $.get("api/vehical/i", function(data) {
                    data = $.parseJSON(data);
                    $.each(data, function(index, value) {
                         console.log(value.vehical_id);
                    });
                });
                
//                func.getData({
//                    url: 'api/category/i',
//                    success: function(data) {
//                        console.log(data);
//                        console.log(that.category);
//                        ///category = data;
//                        //return data;
//                    }
//                });

                var datavar = _.template(itemadd);

                console.log(category);
//                $.each(category, function(index, value) {
//                    // console.log(value);
//                });
                var cmdata = datavar({data: {},
                    category: category});
                $('#vehical-addedit').html(cmdata);
            }
        }
    });
    window.item = window.item || new view();
    return window.item;
});