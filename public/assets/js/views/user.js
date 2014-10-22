//Filename: views user.js

define([
    'text!template/users/main.html',
    'text!template/users/users-list.html'
], function (usertemplate, usersList) {

    var view = Backbone.View.extend({
        el: '#page-wrapper',
        events: {
            'click .user-btn-edit': 'editUser',
            'click .user-btn-delete': 'deleteUser',
            'submit #user-form-create-user': 'saveUser'
        },
        saveUser: function(e){
            var $this = $(e.currentTarget);
            func.submitForm('api/user/i', $this.serializeArray(), {
                success: function(e){
                    if(e){
                        func.renderCurrent();
                    }else{
                        noty({
                            text:'there was some problem updating user information, please try again with right information.'
                        });
                    }
                }
            });
            return false;
        },
        editUser: function(e){
            var $this = $(e.currentTarget);
            var id = $this.data('user-id');
            var $form = $('#user-form-create-user');
            $.get('api/user/i/'+id,function(d){
                d = JSON.parse(d);
                d = d[0];

                $('.user-form-create-user-title').html('Edit user '+d.username);
                if(!$form.find('button[type="submit"]').next().hasClass('btn-warning')){
                    $form.find('button[type="submit"]').after('&nbsp;&nbsp;<button class="btn btn-warning" onclick="func.renderCurrent();return false;">cancel</button>');
                }

                if($form.find('input[type="hidden"]').length != 1){
                    $form.append('<input type="hidden" name="user_id">');
                }
                $form.find('button[type="submit"]').html('edit');
                $form.find('input[type="hidden"]').val(d.user_id);
                $form.find('input[name="signup-username"]').val(d.username);
                $form.find('input[name="signup-password"]').val(d.password);
                $form.find('input[name="signup-mobileno"]').val(d.mobileno);
                $form.find('input[name="signup-group"]').val(d.group);
                $form.find('input[name="signup-email"]').val(d.email);
                $form.find('textarea[name="signup-address"]').val(d.address);

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
    

    window.view = window.view || new view;
    return window.view;

});