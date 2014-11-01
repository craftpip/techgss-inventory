//Filename: views company.js

define([
    'text!template/company/main.html',
    'text!template/company/company-list.html',
    'text!template/company/add-edit.html'
], function (mainView, listView, addEditView) {

    var view = Backbone.View.extend({
        el: '#page-wrapper',
        events: {
            'submit #company-create-new-company': 'formSubmit',
            'click .company-btn-delete': 'deleteCompany'
        },
        deleteCompany: function(e){
            $this = $(e.currentTarget);
            var id = $this.data('company-id');
            func.confirm({
                title: 'Are you sure?',
                content: 'this will deactivate the company, you cannot undo this',
                success: function(){
                    func.delete({
                        url: 'api/company/i/'+id,
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
            return false;
        },
        formSubmit: function(e){
            $this = $(e.currentTarget);
            func.submitForm('api/company/i/', $this.serializeArray(), {
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
        render: function (edit) {
            this.$el.html(mainView);
            this.renderCompanyList();
            this.renderCompanyAddOrEdit(edit);
        },
        renderCompanyList: function () {
            func.getData({
                url: 'api/company/i',
                success: function (companies) {
                    console.log(arguments);
                    var template = _.template(listView);
                    template = template({companies: JSON.parse(companies)});
                    $('#company-listcompanies').html(template);
                    func.bindPlugins();
                }
            });
        },
        renderCompanyAddOrEdit: function(edit){
            if(edit){
                func.getData({
                    url: 'api/company/i/'+edit,
                    success: function(data){
                        console.log(data);
                        var template = _.template(addEditView);
                        template = template({data: JSON.parse(data)});
                        $('#company-add-edit').html(template);      
                    }
                });
            }else{
                var template = _.template(addEditView);
                template = template({data: {}});
                $('#company-add-edit').html(template);
            }
        }
    });

    window.company = window.company || new view();
    return window.company;

});