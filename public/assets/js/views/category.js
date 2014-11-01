//Filename: boilerplate.js

define([
  'text!template/category/main.html',
  'text!template/category/category-list.html',
  'text!template/category/add-edit.html'
], function(main,categorylist,categoryadd){
  var view = Backbone.View.extend({
  	el:'#page-wrapper',
  	events: {
  		'click .category-btn-delete': 'delete',
  		'submit #category-create-new-category': 'submit'
  	},
  	delete: function(e){
  		var $this = $(e.currentTarget);
  		var id = $this.attr('data-category-id');
  		 func.confirm({
                title: 'Are you sure?',
                content: 'this will delete the category, you cannot undo this',
                success: function(){
                    func.delete({
                        url: 'api/category/i/'+id,
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
  	render: function(edit){
      console.log('category is coming');
  		this.$el.html(main);
  		this.rendercategorylist();
  		this.rendercategoryAddEdit(edit);
  	},
  	rendercategorylist: function(){
  		func.getData({
  			url: 'api/category/i',
  			success: function(data){
  				 var datavar = _.template(categorylist);
  				 var cmdata =  datavar({category: JSON.parse(data)});
  				 $('#category-listcategory').html(cmdata);
  			},
  			error: function(){

  			}
  		});
  	},
  	rendercategoryAddEdit: function(edit){
      if(edit){
           func.getData({
                    url: 'api/category/i/'+edit,
                    success: function(data){
                        console.log(data);
                         var template = _.template(categoryadd);
                           template = template({data: JSON.parse(data)});
                         $('#category-add-edit').html(template);      
                    }
                });
      }else{
        		 var datavar = _.template(categoryadd);
        		 var cmdata =  datavar({data: {}});
        		$('#category-add-edit').html(cmdata);
      }
  	}
  });
  window.category = window.category || new view();
  return window.category;
});