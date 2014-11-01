//Filename: boilerplate.js

define([
  'text!template/vehical/main.html',
  'text!template/vehical/vehical-list.html',
  'text!template/vehical/add-edit.html'
], function(main,vehicallist,vehicaladd){
  var view = Backbone.View.extend({
    el:'#page-wrapper',
    events: {
      'click .vehical-btn-delete': 'delete',
      'submit #vehical-create-new-vehical': 'submit'
    },
  	render: function(edit){
  		this.$el.html(main);
  		this.rendervehicallist();
  		this.rendervehicalAddEdit(edit);
  	},
    delete: function(e){
      var $this = $(e.currentTarget);
      var id = $this.attr('data-vehical-id');
      console.log(id);
       func.confirm({
                title: 'Are you sure?',
                content: 'this will delete the vehical, you cannot undo this',
                success: function(){
                    func.delete({
                        url: 'api/vehical/i/'+id,
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
    func.submitForm('api/vehical/i/', $this.serializeArray(), {
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
  			url: 'api/vehical/i',
  			success: function(data){
  				 var datavar = _.template(vehicallist);
  				 var cmdata =  datavar({vehical: JSON.parse(data)});
  				 $('#vehical-listvehical').html(cmdata);
  			},
  			error: function(){

  			}
  		});
  	},
  	rendervehicalAddEdit: function(edit){
      if(edit){
        func.getData({
                    url: 'api/vehical/i/'+edit,
                    success: function(data){
                        console.log(data);
                         var template = _.template(vehicaladd);
                           template = template({data: JSON.parse(data)});
                         $('#vehical-add-edit').html(template);      
                    }
                });
      }else{
    		 var datavar = _.template(vehicaladd);
    		 var cmdata =  datavar({data: {}});
    		$('#vehical-add-edit').html(cmdata);
      }
  	}
  });
  window.vehical = window.vehical || new view();
  return window.vehical;
});