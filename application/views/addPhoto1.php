<?php include "head.php" ?>
	<!-- BEGIN PAGE LEVEL STYLES -->
<!--	<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />-->
<!--	<link href="assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />-->
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />


    <link rel="stylesheet" href="assets/control/css/zyUpload.css" type="text/css">
    <script src="http://www.lanrenzhijia.com/ajaxjs/jquery.min.js"></script>
    <!-- 引用核心层插件 -->
    <script src="assets/core/zyFile.js"></script>
    <!-- 引用控制层插件 -->
    <script src="assets/control/js/zyUpload.js"></script>
    <!-- 引用初始化JS -->
    <script src="assets/core/lanrenzhijia.js"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<?php include "header.php" ?>
<?php include "pageContainer.php" ?>
<?php $shopId=$this->session->userdata('shopId');?>
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
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Multiple File Upload <small>amazing file upload experience</small>
						</h3>
						<ul class="breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="/jinM/shop/manage">管理店铺</a>
                                <i class="icon-angle-right"></i>
                            </li>
                            <li>
                                <a href="/jinM/shop/album/<?=$shopId?>">相册</a>
                                <i class="icon-angle-right"></i>
                            </li>
							<li><a href="#">上传图片</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
                <div id="demo" class="demo"></div>

				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE --> 
	</div>
	<!-- END CONTAINER -->
<?php include "footer2.php"?>

	<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--	<script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>-->
	<!-- BEGIN:File Upload Plugin JS files-->
<!--	<script src="assets/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>-->
	<!-- The Templates plugin is included to render the upload/download listings -->
<!--	<script src="assets/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>-->
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<!--	<script src="assets/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>-->
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<!--	<script src="assets/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>-->
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<!--	<script src="assets/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>-->
	<!-- The basic File Upload plugin -->
<!--	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>-->
	<!-- The File Upload file processing plugin -->
<!--	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-fp.js"></script>-->
	<!-- The File Upload user interface plugin -->
<!--	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>-->
	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
	<!--[if gte IE 8]><!--<script src="assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>--><![endif]-->
	<!-- END:File Upload Plugin JS files-->
	<!-- END PAGE LEVEL PLUGINS -->
	<script src="assets/scripts/app.js"></script>
<!--	<script src="assets/scripts/form-fileupload.js"></script>-->
	<script>
		jQuery(document).ready(function() {
		// initiate layout and plugins
		App.init();
//		FormFileUpload.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>