<?php include "head.php" ?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap/chosen/chosen.css" />
<link href="assets/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />

<!-- END PAGE LEVEL SCRIPTS -->
<link rel="shortcut icon" href="favicon.ico" />
<link href="assets/css/pages/image-crop.css" rel="stylesheet"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<?php include "header.php" ?>
<?php include "pageContainer.php" ?>
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="color-panel hidden-phone">
                <div class="color-mode-icons icon-color"></div>
                <div class="color-mode-icons icon-color-close"></div>
                <div class="color-mode">
                    <p>THEME COLOR</p>
                    <ul class="inline">
                        <li class="color-black current color-default" data-style="default"></li>
                        <li class="color-blue" data-style="blue"></li>
                        <li class="color-brown" data-style="brown"></li>
                        <li class="color-purple" data-style="purple"></li>
                        <li class="color-grey" data-style="grey"></li>
                        <li class="color-white color-light" data-style="light"></li>
                    </ul>
                    <label>
                        <span>Layout</span>
                        <select class="layout-option m-wrap small">
                            <option value="fluid" selected>Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </label>
                    <label>
                        <span>Header</span>
                        <select class="header-option m-wrap small">
                            <option value="fixed" selected>Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </label>
                    <label>
                        <span>Sidebar</span>
                        <select class="sidebar-option m-wrap small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected>Default</option>
                        </select>
                    </label>
                    <label>
                        <span>Footer</span>
                        <select class="footer-option m-wrap small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected>Default</option>
                        </select>
                    </label>
                </div>
            </div>
            <!-- END BEGIN STYLE CUSTOMIZER -->
            <h3 class="page-title">
                <!--							Advance Form Samples-->
                <!--							<small>advance form layout samples</small>-->
            </h3>
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
<!--                    <a href="/jinM/event/manage">管理图片</a>-->
                    <span class="icon-angle-right"></span>
                </li>
                <li>
                    Add Images
                    <span class="icon-angle-right"></span>
                </li>
            </ul>
        </div>
    </div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Add Adver Image</div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="/jinM/adimg/finishiAdd" enctype="multipart/form-data" class="form-horizontal" id="staff-fo
                rm" method ="post">
                    <input class="m-wrap " type="hidden"  name="id" value="" disabled/>

                    <div class="control-group" >
                        <label class="control-label">Module</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <select id="page" name="page">
                                    <option value="1">Home Page</option>
                                    <option value="2">Notification</option>
<!--                                    <option value="3">圈子</option>-->
<!--                                    <option value="4">板块4</option>-->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="desc">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input class="m-wrap " type="text" placeholder="" name="desc" value="" />
                            </div>

                        </div>
                    </div>

                    <div class="control-group" id="path">
                        <label class="control-label">Images</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-home"></i></span>
                                <input class="m-wrap " type="file" placeholder="" name="userfile" value="" />
                            </div>

                        </div>
                    </div>

                    <div class="control-group" id="url">
                        <label class="control-label">URL</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input class="m-wrap " type="text" placeholder="" name="url" value="" />
                            </div>
                        </div>
                    </div>

                    <!--                    <div class="control-group" id="email">-->
                    <!--                        <label class="control-label">展示到以下小区</label>-->
                    <!--                        <div class="controls">-->
                    <!--                            <div class="input-prepend">-->
                    <!--                                <label class="control-label">全局<input type="radio" name="communityId" value="0" checked/></label>-->
                    <!--                                --><?php //foreach ($communityList as $community) {  ?>
                    <!---->
                    <!--                                    <label class="control-label">--><?//=$community['name']?><!--<input type="radio" name="communityId" value="--><?//=$community['id']?><!--" /></label>-->
                    <!--                                --><?php // } ?>
                    <!--                            </div>-->
                    <!---->
                    <!--                        </div>-->
                    <!--                    </div>-->


                    <div id="edit_btn" class="form-actions">
                        <input type="submit" class="btn blue" value="Submit">

                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>

</div>
<!-- END CONTAINER -->
<?php include "footer.php"?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>


<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/form-samples.js"></script>

<script src="assets/plugins/jquery-validation/lib/jquery.form.js"></script>
<!--    <script src="assets/scripts/form-components.js"></script>-->
<script type="text/javascript" charset="utf-8" src="assets/js/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/ueditor.all.min.js"> </script>
<!-- END PAGE LEVEL SCRIPTS -->

<script type="text/javascript">
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormSamples.init();
//            FormComponents.init();
//            var apip = $.Jcrop("#demo3");

    });
    $(document).ready(function(){
        $("#user_edit").click(function(){
            $("input").removeAttr("disabled");
            $("#edit_btn").show();
        });
        $("#edit_cancle").click(function(){
            $("input").attr("disabled","true");
            $("#edit_btn").hide();
        });

    });

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
