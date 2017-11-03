<?php include "head.php" ?>
	<!-- BEGIN PAGE LEVEL STYLES --> 
	<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link href="assets/plugins/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->   
	<link rel="shortcut icon" href="favicon.ico" />
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
							Image Manager <small>image manager</small>
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

						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN GALLERY MANAGER PORTLET-->
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Gallery Manager</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<!-- BEGIN GALLERY MANAGER PANEL-->
								<div class="row-fluid">
									<div class="span4">
<!--										<h4>Browsing Category 1</h4>-->
									</div>
									<div class="span8">
										<div class="pull-right">
											<select data-placeholder="Select Category" class="chosen" tabindex="-1" id="inputCategory">
												<option value="1">All</option>
												<option value="1">Category 1</option>
												<option value="1">Category 2</option>
												<option value="1">Category 3</option>
												<option value="1">Category 4</option>
											</select>
											<select data-placeholder="Sort By" class="chosen input-small" tabindex="-1" id="inputSort">
												<option value="1">Date</option>
												<option value="1">Author</option>
												<option value="1">Title</option>
												<option value="1">Hits</option>
											</select>
											<div class="clearfix space5"></div>
											<a href="/jinM/shop/addPhoto1" class="btn pull-right green"><i class="icon-plus"></i> 上传图片</a>
										</div>
									</div>
								</div>
<!--								<div class="row-fluid">-->
<!--									<div class="span12">-->
<!--										<a class="btn red fancybox-video" href="http://www.youtube.com/embed/L9szn1QQfas?autoplay=1">Open Youtube Video <i class="icon-share"></i></a>-->
<!--										<a class="btn green fancybox-video" href="http://player.vimeo.com/video/56974716?portrait=0">Open Vimeo Video <i class="icon-share"></i></a>-->
<!--									</div>-->
<!--								</div>-->
								<!-- END GALLERY MANAGER PANEL-->
								<hr class="clearfix" />
								<!-- BEGIN GALLERY MANAGER LISTING-->
                                <?php
                                $i=1;
                                foreach($photoList as $photo){
                                    if($i%4==1)
                                        echo "<div class='row-fluid'>";
                                    ?>

                                    <div class="span3">
                                        <div class="item">
                                            <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="/jinM/<?=$photo['image']?>">
                                                <div class="zoom">
                                                    <img src="/jinM/<?=$photo['img']?>" alt="Photo" />
                                                    <div class="zoom-icon"></div>
                                                </div>
                                            </a>
                                            <div class="details">
                                                <a href="javascript:delPhoto(<?=$photo['id']?>);" class="icon"><i class="icon-remove">删除图片</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if($i%4==0&&$i!=0)
                                        echo "</div>";
                                    $i++;
                                } ?>


<!--								<div class="row-fluid">-->
<!--									<div class="span3">-->
<!--										<div class="item">-->
<!--											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image1.jpg">-->
<!--												<div class="zoom">-->
<!--													<img src="assets/img/gallery/image1.jpg" alt="Photo" />                    -->
<!--													<div class="zoom-icon"></div>-->
<!--												</div>-->
<!--											</a>-->
<!--											<div class="details">-->
<!--												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-link"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-pencil"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-remove"></i></a>    -->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="span3">-->
<!--										<div class="item">-->
<!--											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image2.jpg">-->
<!--												<div class="zoom">-->
<!--													<img src="assets/img/gallery/image2.jpg" alt="Photo" />                             -->
<!--													<div class="zoom-icon"></div>-->
<!--												</div>-->
<!--											</a>-->
<!--											<div class="details">-->
<!--												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-link"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-pencil"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-remove"></i></a>    -->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="span3">-->
<!--										<div class="item">-->
<!--											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image3.jpg">-->
<!--												<div class="zoom">-->
<!--													<img src="assets/img/gallery/image3.jpg" alt="Photo" />                             -->
<!--													<div class="zoom-icon"></div>-->
<!--												</div>-->
<!--											</a>-->
<!--											<div class="details">-->
<!--												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-link"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-pencil"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-remove"></i></a>    -->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="span3">-->
<!--										<div class="item">-->
<!--											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image4.jpg">-->
<!--												<div class="zoom">-->
<!--													<img src="assets/img/gallery/image4.jpg" alt="Photo" />                             -->
<!--													<div class="zoom-icon"></div>-->
<!--												</div>-->
<!--											</a>-->
<!--											<div class="details">-->
<!--												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-link"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-pencil"></i></a>-->
<!--												<a href="#" class="icon"><i class="icon-remove"></i></a>    -->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->

								<!-- END GALLERY MANAGER LISTING-->
								<!-- BEGIN GALLERY MANAGER PAGINATION-->
<!--								<div class="row-fluid">-->
<!--									<div class="span12">-->
<!--										<div class="pagination pull-right">-->
<!--											<ul>-->
<!--												<li><a href="#">«</a></li>-->
<!--												<li><a href="#">1</a></li>-->
<!--												<li><a href="#">2</a></li>-->
<!--												<li><a href="#">3</a></li>-->
<!--												<li><a href="#">4</a></li>-->
<!--												<li><a href="#">5</a></li>-->
<!--												<li><a href="#">»</a></li>-->
<!--											</ul>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
								<!-- END GALLERY MANAGER PAGINATION-->
							</div>
						</div>
						<!-- END GALLERY MANAGER PORTLET-->
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
	<script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>   
	<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js"></script>   
	<script src="assets/scripts/gallery.js"></script>  
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   Gallery.init();
		   $('.fancybox-video').fancybox({type: 'iframe'});
		});


        function delPhoto(photoId)
        {
            var delPhotoURL = "/jinM/shop/delPhoto";
            $.ajax({
                type: "post",
                url: delPhotoURL,
                dataType: "json",
                data: {
                    photoId : photoId
                },
                success: function (data) {
                    if(data.status==true){
                        location.reload(true);
                    }
                    else{
                        alert('删除失败');
                    }
                }
            })
        }
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>