<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
<!--<script src="js/demo/dashboard-demo.js"></script>-->

<div class="page-loading ninja-hide">
    <i class="fa fa-minus fa-spin fa-2x"></i>
</div>

<div class="settingsModel" style="display:none">
    <div style="height:80px;"></div>
    <div class="settingsModel-overlay"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-cogs fa-fw"></i> Settings</div>
                <div class="panel-body">
                    <form role="form" id="page-settings">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Theme</label>
                                    <select class="form-control selectpicker" name="theme">
                                        <option value="bootstrap.min">default</option>
                                        <option value="lumen">lumen</option>
                                        <option value="spacelab">spacelab</option>
                                        <option value="ubuntu">Ubuntu</option>
                                        <option value="yeti">yeti</option>
                                        <option value="simplex">simplex</option>
                                        <option value="flaty">flaty</option>
                                        <option value="cerulean">cerulean</option>
                                        <option value="craftpip">craftpip</option>
                                        <option value="cp-windows8">cp-windows8</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Font-size</label>
                                    <input class="form-control" name="fontsize" type="number" min="10" max="40" step="1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="well well-sm">
                                    <p>
                                        Cache contains temporary data stored for reuse, clear it for fresh data.
                                        Your settings will also be cleared.
                                    </p>
                                    <button class="btn btn-warning btn-block" id="clearStorage"><i class="fa fa-trash-o"></i> clear cache</button>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success" id="saveR"><i class="fa fa-rocket"></i> Apply</button>
                        <button class="btn btn-success" id="save"><i class="fa fa-save"></i></button>
                        <button class="btn btn-default" id="cancel"> Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
