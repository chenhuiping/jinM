<?php include "head.php" ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap/chosen/chosen.css" />
    <link href="assets/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
    <!-- END PAGE LEVEL STYLES -->
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
                        Form Wizard
                        <small>form wizard sample</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a>
                            <span class="icon-angle-right"></span>
                        </li>
                        <li>
                            <a href="#">Form Stuff</a>
                            <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#">Form Wizard</a></li>
                    </ul>
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="portlet box blue" id="form_wizard_1">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-reorder"></i> 添加活动 - <span class="step-title">Step 1 of 4</span>
                            </div>
                            <div class="tools hidden-phone">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="" class="form-horizontal" id="submit_form" method="post">
                                <div class="form-wizard">
                                    <div class="navbar steps">
                                        <div class="navbar-inner">
                                            <ul class="row-fluid">
                                                <li class="span3">
                                                    <a href="#tab1" data-toggle="tab" class="step ">
                                                        <span class="number">1</span>
                                                        <span class="desc"><i class="icon-ok"></i> 活动信息</span>
                                                    </a>
                                                </li>
                                                <li class="span3">
                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                        <span class="number">2</span>
                                                        <span class="desc"><i class="icon-ok"></i> 图片设置</span>
                                                    </a>
                                                </li>
                                                <li class="span3">
                                                    <a href="#tab4" data-toggle="tab" class="step">
                                                        <span class="number">3</span>
                                                        <span class="desc"><i class="icon-ok"></i> 完成</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="bar" class="progress progress-success progress-striped">
                                        <div class="bar"></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-error hide">
                                            <button class="close" data-dismiss="alert"></button>
                                            You have some form errors. Please check below.
                                        </div>
                                        <div class="alert alert-success hide">
                                            <button class="close" data-dismiss="alert"></button>
                                            Your form validation is successful!
                                        </div>
                                        <div class="tab-pane active" id="tab1">
                                            <h3 class="block">活动信息</h3>
                                            <div class="control-group">
                                                <label class="control-label">活动名称<span class="required">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="span6 m-wrap" name="eventName" id="eventName"/>
                                                    <span class="help-inline">Provide your username</span>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">地址<span class="required">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="span6 m-wrap" name="address" id="address" />
                                                    <span class="help-inline">Provide your street address</span>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">时间<span class="required">*</span></label>
                                                <div class="controls">
                                                    <div class="input-append date form_meridian_datetime" data-date="<?=date('Y-m-d')?>T<?=date('H:i:s')?>Z">
                                                        <input size="16" type="text" value="" readonly class="m-wrap" name="eventTime" id="eventTime">
                                                        <span class="add-on"><i class="icon-remove"></i></span>
                                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">分类</label>
                                                <div class="controls">
                                                    <select name="category" id="category" class="span6">
                                                        <option value="">Select</option>
                                                        <option value="1">出行</option>
                                                        <option value="2">音乐</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">活动图片</h3>

                                            <div class="row-fluid">
                                                <div class="span7">
                                                    <!-- This is the image we're attaching Jcrop to -->
                                                    <img src="/jinM/uploads/shop/image5.jpg" id="demo8" alt="Jcrop Example" />
                                                </div>
                                                <div class="span5">
                                                    <h4>An example server-side crop script.</h4>
                                                    <p>
                                                        Hidden form values
                                                        are set when a selection is made. If you press the <i>Crop Image</i>
                                                        button, the form will be submitted and a 150x150 thumbnail will be
                                                        dumped to the browser. Try it!
                                                    </p>
                                                    <!-- This is the form that our event handler fills -->
<!--                                                    <form action="assets/plugins/jcrop/crop-demo.php" target="_blank" method="post" id="demo8_form">-->
                                                    <form action="" target="_blank" method="post" id="demo8_form">
                                                        <input type="hidden" id="crop_x" name="x" />
                                                        <input type="hidden" id="crop_y" name="y" />
                                                        <input type="hidden" id="crop_w" name="w" />
                                                        <input type="hidden" id="crop_h" name="h" />
                                                        <input type="submit" value="Crop Image" class="btn btn-large green" />
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="tab4">
                                            <h3 class="block">确认信息</h3>

                                            <div class="control-group">
                                                <label class="control-label">活动名称:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="eventName"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">地址:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="address"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">活动时间:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="eventTime"></span>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">分类:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="category"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-actions clearfix">
                                        <a href="javascript:;" class="btn button-previous">
                                            <i class="m-icon-swapleft"></i> Back
                                        </a>
                                        <a href="javascript:;" class="btn blue button-next">
                                            Continue <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                        <a href="javascript:;" class="btn green button-submit">
                                            Submit <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<?php include "footer.php"?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>

<script src="assets/plugins/jcrop/js/jquery.color.js"></script>
<script src="assets/plugins/jcrop/js/jquery.Jcrop.min.js"></script>

<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/form-wizard.js"></script>
<script src="assets/scripts/form-image-crop.js"></script>
<script src="assets/scripts/form-components.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->


<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormWizard.init();
        FormImageCrop.init();
        FormComponents.init();
    });

    function add()
    {
        var eventName = document.getElementById('eventName').value;
        var eventTime = document.getElementById('eventTime').value;
        var address = document.getElementById('address').value;
        var category =document.getElementById('category').value;

        var x =document.getElementById('crop_x').value;
        var y =document.getElementById('crop_y').value;
        var w =document.getElementById('crop_w').value;
        var h =document.getElementById('crop_h').value;

        var addEventURL = "/jinM/event/addEvent_do";
        $.ajax({
            type: "post",
            url: addEventURL,
            dataType: "json",
            data: {
                eventName : eventName,
                eventTime : eventTime,
                address : address,
                category : category,
                x : x,
                y : y,
                w : w,
                h : h
            },
            success: function (data) {
                if(data.status==true)
                {
                    alert('Finished! Hope you like it :)');
                    location.href='/jinM/event/Manage';
                }
                else{
                    alert('上传失败');
                }
            }
        })
    }
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>