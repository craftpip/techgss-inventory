//Filename: views user.js

define([
    'text!template/users/main.html',
    'text!template/users/users-list.html'
], function (usertemplate, usersList) {

    var view = Backbone.View.extend({
        el: '#page-wrapper',
        events: {
            'click .user-btn-edit': 'editUser',
            'click .user-btn-delete': 'deleteUser'
        },
        editUser: function(e){
            var $this = $(e.currentTarget);
            var id = $this.data('user-id');
            var $form = $('#user-form-create-user');
            $('.user-form-create-user-title').html('edit user');
            $form.find('button[]').after('&nbsp;&nbsp;<button class="btn btn-warning" onclick="func.renderCurrent();return false;">cancel</button>');
            $.get('api/user/i/'+id,function(d){
                console.log(d);
            });
            return false;
        },
        deleteUser: function(e){
            var $this = $(e.currentTarget);
            var id = $this.data('user-id');
            var that = this;
            func.confirm({
                title: 'Confirm delete',
                content: 'Do you really want to delete this user.',
                success: function(){
                    func.delete({
                        url: 'api/user/i/',
                        data: id, 
                        success: function(e){
                            if(e){
                                noty({
                                    text: 'Successfully deleted'
                                });
                                that.renderUsersList();
                            }else{
                                noty({
                                    text: 'There was a problem at the server'
                                })
                            }
                        }
                    });
                }
            });
            return false;
        },
        render: function () {
            this.$el.html(usertemplate);
            this.renderUsersList();
        },
        renderUsersList: function(){
            func.getData({
                url: 'api/user/i',
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    var html = _.template(usersList);
                    html = html({data: data});
                    $('#users-listusers').html(html);
                    func.bindPlugins();
                }
            });
        }
        
    });
    
    return view;

});