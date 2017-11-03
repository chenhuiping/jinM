<?php include "head.php" ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap/chosen/chosen.css" />
    <link href="assets/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
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
                                <i class="icon-reorder"></i> 添加店铺 - <span class="step-title">Step 1 of 4</span>
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
                                                        <span class="desc"><i class="icon-ok"></i> 店铺信息</span>
                                                    </a>
                                                </li>
                                                <li class="span3">
                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                        <span class="number">2</span>
                                                        <span class="desc"><i class="icon-ok"></i> 头像设置</span>
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
                                            <h3 class="block">店铺信息</h3>
                                            <div class="control-group">
                                                <label class="control-label">店铺名称<span class="required">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="span6 m-wrap" name="shopName" id="shopName"/>
                                                    <span class="help-inline" style="display: none">Provide your username</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">电话号码<span class="required">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="span6 m-wrap" name="tel" id="tel"/>
                                                    <span class="help-inline" style="display: none">Provide your phone number</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">地址<span class="required">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="span6 m-wrap" name="address" id="address" />
                                                    <span class="help-inline" style="display: none">Provide your street address</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">特色服务</label>
                                                <div class="controls">
                                                    <input type="text" class="span6 m-wrap" name="intro" id="intro"/>
                                                    <span class="help-inline" style="display: none">Provide your fullname</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">店铺简介</label>
                                                <div class="controls">
                                                    <textarea class="span6 m-wrap" rows="3" name="desc" id="desc"></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">分类</label>
                                                <div class="controls">
                                                    <select name="category" id="category" class="span6">
                                                        <option value="">Select</option>
                                                        <option value="1">Dining</option>
                                                        <option value="2">Message</option>
                                                        <option value="3">Coffe</option>
                                                        <option value="4">Bar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">店铺头像</h3>

                                            <div class="control-group">
                                                <form method="post" enctype="multipart/form-data" action="/jinM/shop/uploadSpPhoto" >
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
												<span class="btn btn-file">
												<span class="fileupload-new">Select file</span>
												<span class="fileupload-exists">Change</span>
												<input type="file" class="default" name="userfile" size="20" />
												</span>
                                                        <span class="fileupload-preview"></span>
                                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a>
                                                        <button name="upload-btn" id="upload-btn">上传图片</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="row-fluid" style="display: none">
                                                <div class="span7">
                                                    <!-- This is the image we're attaching Jcrop to -->
                                                    <img src="" id="demo8" alt="Jcrop Example"/>
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
                                                <label class="control-label">店铺名称:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="shopName"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">电话:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="tel"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">地址:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="address"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">特色服务:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="intro"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">店铺简介:</label>
                                                <div class="controls">
                                                    <span class="text display-value" data-display="desc"></span>
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
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/form-wizard.js"></script>
<script src="assets/scripts/form-image-crop.js"></script>
<script src="assets/plugins/jquery-validation/lib/jquery.form.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->


<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormWizard.init();
        FormImageCrop.init();
        $('#upload-btn').click(function(){
            alert('haha');
            $('#uploadForm').ajaxForm({
                dataType: 'json',
                success: function (data) {
                    alert("success");
                }
            });
        });
    });

    function add()
    {
        var shopName = document.getElementById('shopName').value;
        var tel = document.getElementById('tel').value;
        var address = document.getElementById('address').value;
        var intro = document.getElementById('intro').value;
        var desc = document.getElementById('desc').value;
        var category =document.getElementById('category').value;

        var x =document.getElementById('crop_x').value;
        var y =document.getElementById('crop_y').value;
        var w =document.getElementById('crop_w').value;
        var h =document.getElementById('crop_h').value;

        var addShopURL = "/jinM/shop/addShop_do";
        $.ajax({
            type: "post",
            url: addShopURL,
            dataType: "json",
            data: {
                shopName : shopName,
                tel : tel,
                address : address,
                intro : intro,
                desc :desc,
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
                    location.href='/jinM/shop/Manage';
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