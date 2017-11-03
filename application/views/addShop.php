<?php include "head.php" ?>
	<!-- BEGIN PAGE LEVEL STYLES --> 
	<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap/chosen/chosen.css" />
    <link href="assets/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
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
                                <a href="/jinM/shop/manage">管理店铺</a>
                                <i class="icon-angle-right"></i>
                            </li>
							<li>
								添加店铺
								<span class="icon-angle-right"></span>
							</li>

						</ul>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">


								<div class="tab-pane " id="tab_1">
									<div class="portlet box green">
										<div class="portlet-title">
											<div class="caption"><i class="icon-reorder">添加店铺</i></div>
											<div class="tools">
												<a href="javascript:;" class="collapse"></a>
												<a href="#portlet-config" data-toggle="modal" class="config"></a>
												<a href="javascript:;" class="reload"></a>
												<a href="javascript:;" class="remove"></a>
											</div>
										</div>
										<div class="portlet-body form">
											<!-- BEGIN FORM-->
                                            <form id="form1">
												<h3 class="form-section">店铺信息</h3>
												<div class="row-fluid">
													<div class="span6 ">
														<div class="control-group" id="shopName-cg">
															<label class="control-label ">店铺名称 </label>
															<div class="controls">
																<input type="text" class="m-wrap span12" placeholder="呷哺呷哺" id="shopName" >
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="span6 ">
														<div class="control-group">
															<label class="control-label" id="tel-cg">电话号码 <span style="color:red">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="m-wrap span12" placeholder="1368945xxxx" id="tel"  >
                                                            </div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row-fluid">
													<div class="span6 ">
														<div class="control-group">
															<label class="control-label">详细地址 <span style="color:red">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="m-wrap span12" placeholder="天津市西青区" id="address" >
                                                            </div>
														</div>
													</div>
													<!--/span-->
													<div class="span6 ">
														<div class="control-group">
															<label class="control-label" >特色服务</label>
                                                            <div class="controls">
                                                                <input type="text" class="m-wrap span12" placeholder="蔬菜套餐 肥牛套餐 羊肉拼盘 丸子双拼" id="intro"  >

                                                            </div>
														</div>
													</div>
													<!--/span-->
												</div>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label">分类 <span style="color:red">*</span></label>
                                                            <div class="controls">
                                                                <select name="category" id="category" class="span10" onchange="getChild()">
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($categoryList as $category){ ?>
                                                                        <option value="<?=$category['id']?>" ><?=$category['name']?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label">子类 <span style="color:red">*</span></label>
                                                            <div class="controls">
                                                                <select name="catechild" id="catechild" class="span6">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label">地理位置 <span style="color:red">*</span></label>
                                                            <div class="controls">
                                                                定位地址：<input id="text_" type="text" name="address" value="" style="margin-right:100px;" />
                                                                <input type="button" value="查询" onclick="searchByStationName(); " />
                                                                <input type="button" value="地图开关" onclick="btn_click();" /><br/>
                                                                <br/>
                                                                获取经纬度：<input id="result_"  type="text" name="result_"  value="" />
                                                            </div>
                                                            <div id="container_map"
                                                                 style="display: none;
                                                                    position: relative;
                                                                   margin-left: 100px;;

                                                                    width: 500px;
                                                                    height:400px;

                                                                    border: 1px solid gray;
                                                                    overflow:hidden;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6 ">
                                                        <div class="control-group">
                                                            <label class="control-label" >店铺简介</label>
                                                            <div class="controls">
                                                                <textarea class="span6 m-wrap" rows="3" name="desc" id="desc" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                <div class="row-fluid">
                                                    <div class="span6 ">
                                                        <div class="control-group">
                                                            <label class="control-label" >优惠信息标题</label>
                                                            <div class="controls">
                                                                <textarea class="span6 m-wrap" rows="1" name="disTitle" id="disTitle" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6 ">
                                                        <div class="control-group">
                                                            <label class="control-label" >优惠信息详情</label>
                                                            <div class="controls">
                                                                <textarea class="span6 m-wrap" rows="5" name="discount" id="discount" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<!--/row-->
                                            </form>
                                                <h3 class="form-section">头像设置</h3>
												<div class="row-fluid">
													<div class="span6 ">
														<div class="control-group">
															<label class="control-label">上传图片</label>
															<div class="controls">
                                                                <form method="post" enctype="multipart/form-data" action="/jinM/shop/uploadSpPhoto" id="uploadForm" name="uploadForm" >
                                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                        <span class="btn btn-file">
                                                                        <span class="fileupload-new">Select file</span>
                                                                        <span class="fileupload-exists">Change</span>
                                                                            <input type="file" class="default" name="userfile" size="20" id="userfile" />
                                                                        </span>
                                                                        <span class="fileupload-preview"></span>
                                                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none" ></a>
                                                                        <input type="submit" value="上传图片" name="upload-btn" id="upload-btn"/>
                                                                        <input value="" name="imgPath" id="imgPath"  hidden="hidden"/>
                                                                        <input value="" name="imagePath" id="imagePath" hidden="hidden"/>
                                                                    </div>
                                                                </form>
															</div>
														</div>
													</div>
													<!--/span-->

												</div>

												<!--/row-->
												<div class="form-actions">
													<button type="button" class="btn blue" onclick="add()"><i class="icon-ok"></i> Save</button>
                                                    <button type="button" class="btn" onclick="javascript:history.back();">Cancel</button>
												</div>

											<!-- END FORM-->                
										</div>
									</div>
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
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>

<!--    <script src="assets/plugins/jcrop/js/jquery.color.js"></script>-->
<!--    <script src="assets/plugins/jcrop/js/jquery.Jcrop.min.js"></script>-->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js"></script>
	<script src="assets/scripts/form-samples.js"></script>

<!--    <script src="assets/scripts/form-image-crop.js"></script>-->
    <script src="assets/plugins/jquery-validation/lib/jquery.form.js"></script>
    <script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=nZPCcCNadHWxMYxOjLLocxba"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {    
		   // initiate layout and plugins
		   App.init();
		   FormSamples.init();
//            FormImageCrop.init();

//            var apip = $.Jcrop("#demo3");

//            $("form :input.required").each(function(){
//                var $required = $("<strong class='high'> *</strong>"); //创建元素
//                $(this).parent().append($required); //然后将它追加到文档中
//            });

            $('form :input').blur(function(){
                var $parent = $(this).parent();
                $parent.find(".formtips").remove();
                if( $(this).is('#shopName') ){
                    //alert("shopName");
                    if( this.value==""){
                        var errorMsg = '请输入店铺名.';
                        $parent.append('<span class="formtips onError error" style="color:red">'+errorMsg+'</span>');
                    }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                    }
                }
                if( $(this).is('#address') ){
                    //alert("shopName");
                    if( this.value==""){
                        var errorMsg = '请输入店铺地址';
                        $parent.append('<span class="formtips onError error" style="color:red">'+errorMsg+'</span>');
                    }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                    }
                }
                if( $(this).is('#tel') ){
                    //alert("shopName");
                    if( this.value==""){
                        var errorMsg = '请输入电话.';
                        $parent.append('<span class="formtips onError error" style="color:red">'+errorMsg+'</span>');
                    }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                    }
                }
                if( $(this).is('#category') ){
                    //alert("shopName");
                    if( this.value=="" ){
                        var errorMsg = '请选择分类.';
                        $parent.append('<span class="formtips onError error" style="color:red">'+errorMsg+'</span>');
                    }else{

                    }
                }
            })
		});

        function getChild()
        {
            var pid=document.getElementById('category').value;
            var getChildURL = "/jinM/shop/getChild";
            $.ajax({
                type: "post",
                url: getChildURL,
                dataType: "json",
                data: {
                    categoryId : pid
                },
                success: function (data) {
//                    alert(data.childList);
                    var str= "";
                    for(var i=0;i<data.childList.length;i++)
                    {
                        var name = data.childList[i].name;
                        var id = data.childList[i].id;
                        str = str+"<option value='"+id+"'>"+name+"</option>";
                    }
//                    alert(str);
                    document.getElementById('catechild').innerHTML = str;
                }
            })
        }


        function btn_click(){
            $("#container_map").toggle();
        }

        var map = new BMap.Map("container_map");
        map.centerAndZoom("天津", 12);
        map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
        map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

        map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
        map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
        map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开

        var localSearch = new BMap.LocalSearch(map);
        localSearch.enableAutoViewport(); //允许自动调节窗体大小
        function searchByStationName() {
            map.clearOverlays();//清空原来的标注
            var keyword = document.getElementById("text_").value;
            localSearch.setSearchCompleteCallback(function (searchResult) {
                var poi = searchResult.getPoi(0);
                document.getElementById("result_").value = poi.point.lng + "," + poi.point.lat;
                map.centerAndZoom(poi.point, 13);
                var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));  // 创建标注，为要查询的地方对应的经纬度
                map.addOverlay(marker);
                var content = document.getElementById("text_").value + "<br/><br/>经度：" + poi.point.lng + "<br/>纬度：" + poi.point.lat;
                var infoWindow = new BMap.InfoWindow("<p style='font-size:14px;'>" + content + "</p>");
                marker.addEventListener("click", function () { this.openInfoWindow(infoWindow); });
                // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
            });
            localSearch.search(keyword);
        }





        //        var api = $.Jcrop('#demo8');
        $('#upload-btn').click(function(){
//            var file = $("#userfile").val();
//            var FileExt=file.replace(/.+\./,"");   //正则表达式获取后缀
            $('#uploadForm').ajaxForm({
                dataType: 'json',
                success: function (data) {
                    alert("上传成功");
                    //alert(data.thumb_path);
                    document.getElementById('imgPath').value=data.thumb_path;
                    document.getElementById('imagePath').value=data.path
                }
            });
        });


        function add()
        {
            var shopName = document.getElementById('shopName').value;
            var tel = document.getElementById('tel').value;
            var address = document.getElementById('address').value;
            var intro = document.getElementById('intro').value;
            var desc = document.getElementById('desc').value;
            var discount = document.getElementById('discount').value;
            var disTitle = document.getElementById('disTitle').value;
            var category =document.getElementById('category').value;
            var imagePath =document.getElementById('imagePath').value;
            var imgPath = document.getElementById('imgPath').value
            var location = document.getElementById('result_').value;
            var childId = document.getElementById('catechild').value;

            $("form :input.required").trigger('blur');
            var numError = $('form .onError').length;
            if(numError){
                return false;
            }
            else if(shopName.length==0 || tel.length==0 || address.length==0  || category==""){
                alert("请将必填信息填写完整");
                return false;
            }
            else
            {
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
                        imagePath : imagePath,
                        imgPath : imgPath,
                        location : location,
                        childId : childId,
                        disTitle : disTitle,
                        discount : discount
                    },
                    success: function (data) {
                        if(data.status==true)
                        {
                            alert('Finished! Hope you like it :)');
                            window.location.href='/jinM/shop/Manage';
                            //alert(data.status);
                        }
                        else{
                            alert('上传失败');
                        }
                    }
                })
            }
        }

//        //提交，最终验证。
//        $('#send').click(function(){
//            $("form :input.required").trigger('blur');
//            var numError = $('form .onError').length;
//            if(numError){
//                return false;
//            }
//            alert("注册成功,密码已发到你的邮箱,请查收.");
//        });



	</script>
	<!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>