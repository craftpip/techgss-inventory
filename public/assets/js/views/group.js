define([
    'text!template/group/main.html',
    'text!template/group/grouplist.html',
    'text!template/group/add-edit.html'

], function(main, grouplist, addedit) {

    var view = Backbone.View.extend({
        el: '#page-wrapper',
        events: {
            'click .group-btn-delete': 'delete',
            'submit #group-create-new-group': 'submit'
        },
        render: function(edit) {
            this.$el.html(main);
            this.rendergrouplist();
            this.rendergroupAddEdit(edit);
        },
        submit: function(e) {
            $this = $(e.currentTarget);
            func.submitForm('api/group/i/', $this.serializeArray(), {
                success: function(e) {
                    if (e) {
                        noty({
                            text: 'successfully updated the information.'
                        });
                    } else {
                        noty({
                            text: 'we faced some problem in updating the information. please try again later.'
                        });
                    }
                    func.renderCurrent();
                }
            });
            return false;

        },
        delete: function(e) {
            var $this = $(e.currentTarget);
            var id = $this.attr('data-group-id');
            func.confirm({
                title: 'Are you sure?',
                content: 'this will delete the Group, you cannot undo this',
                success: function() {
                    func.delete({
                        url: 'api/group/i/' + id,
                        group_id: id,
                        success: function(data) {
                            if (data) {
                                noty({
                                    text: 'Successful<br>Changed status to delete'
                                });
                            } else {
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
        rendergrouplist: function() {
            func.getData({
                url: 'api/group/i',
                success: function(data) {
                    console.log(data);
                    var datavar = _.template(grouplist);
                    var cmdata = datavar({group: JSON.parse(data)});
                    $('#group-listgroup').html(cmdata);
                },
                error: function() {
                }
            });
        },
        rendergroupAddEdit: function(edit) {
            if(edit){
                 func.getData({
                    url: 'api/group/i/'+edit,
                    success: function(data){
                        console.log(data);
                         var template = _.template(addedit);
                           template = template({data: JSON.parse(data)});
                         $('#group-add-edit').html(template);      
                    }
                });
            }else{

            var datavar = _.template(addedit);
            var cmdata = datavar({data: {}});
            $('#group-add-edit').html(cmdata);
            }
        }

    });
    window.group = window.group || new view();
    return window.group;
});