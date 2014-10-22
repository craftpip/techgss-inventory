<!DOCTYPE html>
<html>

    <?php echo View::forge('header'); ?>
    
    <body> 
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default ">
                        <div class="panel-heading">
                            <h3 class="text-center">Inventory</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="#" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>
                                <div class="alert alert-danger alert-dismissable" style="<?php echo Input::get('error') ? 'display:block' : 'display:none' ?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    The email or password is incorrect.
                                </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-default btn-block"><i class="fa fa-sign-in"></i> Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
