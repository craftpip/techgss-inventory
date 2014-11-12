//Filename: boilerplate.js

define([
  'text!template/sale/main.html',
  'text!template/sale/addeditinquiry.html',
  'text!template/sale/salelist.html'
], function(main,saleadd,salelist){
  var view = Backbone.View.extend({
    el:'#page-wrapper',
    events: {
      'click .vehical-btn-delete': 'delete',
      'submit #vehical-create-new-vehical': 'submit'
    },
  	render: function(type,edit){
  		this.$el.html(main);
                if(type == 'inquiry'){
  		          this.rendersaleAddEdit(edit);
                }else{
                  if(type == 'list'){
                      this.rendersalelist(edit);
                  }
                }
  		// this.rendervehicallist();
  	},
   rendersaleAddEdit: function(id){
        if(id){

        }else{
           var datavar = _.template(saleadd);
            var cmdata =  datavar({data: {}});
           $('#sale-addedit').html(cmdata);
        }
   },
   rendersalelist: function(id){
            var datavar = _.template(salelist);
            var cmdata =  datavar({data: {}});
           $('#sale-addedit').html(cmdata);
   }
  });
  window.sale = window.sale || new view();
  return window.sale;
});