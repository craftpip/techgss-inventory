//Filename: boilerplate.js

define([
  'text!template/purchase/main.html',
  'text!template/purchase/addeditpurchase.html',
  'text!template/purchase/purchaselist.html'  
], function(main,purchaseadd,purchaselist){
  var view = Backbone.View.extend({
    el:'#page-wrapper',
    events: {
      'click .vehical-btn-delete': 'delete',
      'submit #vehical-create-new-vehical': 'submit'
    },
    render: function(type,edit){
      this.$el.html(main);
                if(type == 'inquiry'){
                     this.renderpurchaseAddEdit(edit);
                }else{
                  if(type == 'list'){
                      this.renderpurchaselist(edit);
                  }
                }
      // this.rendervehicallist();
    },
   renderpurchaseAddEdit: function(id){
        if(id){

        }else{
           var datavar = _.template(purchaseadd);
            var cmdata =  datavar({data: {}});
           $('#purchase-addedit').html(cmdata);
        }
   },
   renderpurchaselist: function(id){
            var datavar = _.template(purchaselist);
            var cmdata =  datavar({data: {}});
           $('#purchase-addedit').html(cmdata);
   }
  });
  window.purchase = window.purchase || new view();
  return window.purchase;
});