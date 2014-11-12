//Filename: boilerplate.js

define([
  'text!template/item/main.html',
  'text!template/item/addedit.html'
], function(main,itemadd){
  var view = Backbone.View.extend({
    el:'#page-wrapper',
    events: {
      'click .vehical-btn-delete': 'delete',
      'submit #vehical-create-new-vehical': 'submit'
    },
  	render: function(edit){
  		this.$el.html(main);
  		// this.rendervehicallist();
  		 this.renderitemAddEdit(edit);
  	},
   renderitemAddEdit: function(id){
        if(id){

        }else{
            var category,vehical;
             func.getData({
                url: 'api/category/i',
                success: function (data) {
                    category = data;
                    console.log(data);
                }
            });
            func.getData({
                url: 'api/vehical/i',
                success: function (data) {
                    vehical = data;
                    console.log(data);
                }
            });
            func.getData({
                url: 'api/dom/i',
                success: function (data) {
                    vehical = data;
                    console.log(data);
                }
            });
            
            var datavar = _.template(itemadd);
            
            var cmdata =  datavar({data: {},
                                   category:  category});
            $('#vehical-addedit').html(cmdata);
        }
   }
  });
  window.item = window.item || new view();
  return window.item;
});