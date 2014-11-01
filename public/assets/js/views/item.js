//Filename: boilerplate.js

define([
  'text!template/item/main.html',
  'text!template/item/addedit.html'
], function(main,vehicaladd){
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
           var datavar = _.template(vehicaladd);
            var cmdata =  datavar({data: {}});
           $('#vehical-addedit').html(cmdata);
        }
   }
  });
  window.item = window.item || new view();
  return window.item;
});