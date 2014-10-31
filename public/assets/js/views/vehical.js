//Filename: boilerplate.js

define([
  'text!template/vehical/main.html',
  'text!template/vehical/vehical-list.html',
  'text!template/vehical/add-edit.html'
], function(main,categorylist,categoryadd){
  var view = Backbone.View.extend({
    el:'#page-wrapper',
    events: {
      'click .category-btn-delete': 'delete',
      'submit #category-create-new-category': 'submit'
    },
  	render: function(){
  		this.$el.html(main);
  		this.rendervehicallist();
  		this.rendervehicalAddEdit();
  	},
    delete: function(e){
      var $this = $(e.currentTarget);
      var id = $this.attr('data-category-id');
       func.confirm({
                title: 'Are you sure?',
                content: 'this will delete the category, you cannot undo this',
                success: function(){
                    func.delete({
                        url: 'api/category/i/',
                        category_id: id,
                        success: function(data){
                            if(data){
                                noty({
                                    text: 'Successful<br>Changed status to delete'
                                });
                            }else{
                                noty({
                                    text: 'couldn\'t delete the company. please try again later.'
                                });
                            }
                            func.renderCurrent();
                        }
                    });
                }
            });
    },
    submit: function(e){
    $this = $(e.currentTarget);
    func.submitForm('api/category/i/', $this.serializeArray(), {
      success: function(e) {
         if(e){
             noty({
                 text: 'successfully updated the information.'
             });
         }else{
             noty({
                 text: 'we faced some problem in updating the information. please try again later.'
             });
         }
         func.renderCurrent();
      }
    });
            return false;
    },
  	rendervehicallist: function(){
  		func.getData({
  			url: 'api/category/i',
  			success: function(data){
  				 var datavar = _.template(categorylist);
  				 var cmdata =  datavar({companies: JSON.parse(data)});
  				 $('#category-listcategory').html(cmdata);
  			},
  			error: function(){

  			}
  		});
  	},
  	rendervehicalAddEdit: function(){
  		 var datavar = _.template(categoryadd);
  		 var cmdata =  datavar({data: {}});
  		$('#company-add-edit').html(cmdata);
  	}
  });
  window.category = window.category || new view();
  return window.category;
});