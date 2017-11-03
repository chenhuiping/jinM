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
                                <a href="/jinM/shop/manageCategory">管理店铺分类</a>
                                <span class="icon-angle-right"></span>
                            </li>
                            <li>
                                修改分类
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
											<div class="caption"><i class="icon-reorder">修改店铺分类</i></div>
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
												<h3 class="form-section">分类信息</h3>
												<div class="row-fluid">
													<div class="span6 ">
														<div class="control-group">
															<label class="control-label">分类名称</label>
															<div class="controls">
																<input type="text" class="m-wrap span12" placeholder="呷哺呷哺" id="categoryName" value="<?=$category['name']?>">
															</div>
														</div>
													</div>
												</div>
                                                </form>
												<!--/row-->
                                                <h3 class="form-section">头像设置</h3>
												<div class="row-fluid">
													<div class="span6 ">
														<div class="control-group">
															<label class="control-label">上传图片</label>
															<div class="controls">
                                                                <form method="post" enctype="multipart/form-data" action="/jinM/shop/uploadCgPhoto" id="uploadForm" name="uploadForm" >
                                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                        <span class="btn btn-file">
                                                                        <span class="fileupload-new">Select file</span>
                                                                        <span class="fileupload-exists">Change</span>
                                                                            <input type="file" class="default" name="userfile" size="20" id="userfile" />
                                                                        </span>
                                                                        <span class="fileupload-preview"></span>
                                                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none" ></a>
                                                                        <input type="submit" value="上传图片" name="upload-btn" id="upload-btn"/>
                                                                        <input value="<?=$category['img']?>" name="imgPath" id="imgPath"  hidden="hidden"/>
                                                                        <input value="" name="imagePath" id="imagePath" hidden="hidden"/>
                                                                    </div>
                                                                </form>
															</div>
														</div>
													</div>
													<!--/span-->

												</div>
                                            <form>
                                                <h3 class="form-section">子类设置</h3>
                                                <div class="row-fluid">
                                                    <div class="span6 ">
                                                        <div class="control-group">
                                                            <?php foreach($childList as $child) { ?>
                                                            <label class="control-label">子类名称 <span style="color:#ff0000">*</span></label>
                                                            <div class="controls">
                                                                <input type="hidden" value="<?=$child['id']?>" name="childId">
                                                                <input type="text" placeholder="中餐" class="m-wrap medium" name="childName" value="<?=$child['name']?>">
                                                            </div>

                                                            <?php } ?>

                                                            <div class="control-group" id="addBtn">
                                                                <button type="button" class="btn" id="addInput"><i class="icon-plus"></i>添加子类</button>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
												<!--/row-->
												<div class="form-actions">
													<button type="button" class="btn blue" onclick="edit()"><i class="icon-ok"></i> Save</button>
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

	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js"></script>
	<script src="assets/scripts/form-samples.js"></script>


    <script src="assets/plugins/jquery-validation/lib/jquery.form.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {    
		   // initiate layout and plugins
		   App.init();
		   FormSamples.init();
            $('form :input').blur(function(){
                var $parent = $(this).parent();
                $parent.find(".formtips").remove();
                if( $(this).is('#categoryName') ){
                    //alert("shopName");
                    if( this.value==""){
                        var errorMsg = '请输入分类名.';
                        $parent.append('<span class="formtips onError error">'+errorMsg+'</span>');
                    }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                    }
                }
            })
		});

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




        function edit()
        {
            var categoryId = <?=$category['id']?>;
            var categoryName = document.getElementById('categoryName').value;
            var imagePath =document.getElementById('imagePath').value;
            var imgPath = document.getElementById('imgPath').value;

            var childName = $("[name='childName']");                            //读取到的childName
            var childId = $("[name='childId']");                                //读取到的childId
            var childNew =  $("[name='childNew']");                             //新加的child

//            alert(childName[0].value);
//            alert(childNew[0].value);
//            return;

            $("form :input.required").trigger('blur');
            var numError = $('form .onError').length;
            if(numError){
                return false;
            }
            else if(categoryName.length==0){
                alert("请将必填信息填写完整");
                return false;
            }


            var editCategoryURL = "/jinM/shop/editCategory_do";
            $.ajax({
                type: "post",
                url: editCategoryURL,
                dataType: "json",
                data: {
                    categoryId : categoryId,
                    categoryName : categoryName,
                    imagePath : imagePath,
                    imgPath : imgPath
                },
                success: function (data) {
                    for(var i=0;i<childName.length;i++)
                    {
                        editChild(childName[i].value,childId[i].value);
                    }
                    for(var j=0;j<childNew.length;j++)
                    {
                        addChild(childNew[j].value,categoryId);
                    }
                    alert('Finished! Hope you like it :)');
                    window.location.href='/jinM/shop/ManageCategory';
                }
            })
        }

        $("#addInput").click(function(){
            var str ="<label class='control-label'>子类名称<span style='color:#ff0000'>*</span></label>";
            str = str + "<div class='controls'>";
            str = str + "<input type='text' placeholder='中餐' class='m-wrap medium' name='childNew'>";
            str = str + "</div>";


            var addBtn=document.getElementById("addBtn");
            var div=document.createElement("div");
            div.innerHTML=str;
            div.setAttribute("class", "control-group");
            addBtn.onclick=function(){
                addBtn.parentNode.insertBefore(div,addBtn);
            }
        })

        function editChild(childName,childId)
        {
            var editChildURL = "/jinM/shop/editChild_do";
            $.ajax({
                type: "post",
                url: editChildURL,
                traditional :true,                  //提交数组
                dataType: "json",
                data: {
                    childId : childId,
                    childName :childName
                },
                success: function (data) {

                }
            })
        }

        function addChild(childName,pid)
        {
            var addChildURL = "/jinM/shop/addChild_do";
            $.ajax({
                type: "post",
                url: addChildURL,
                traditional :true,                  //提交数组
                dataType: "json",
                data: {
                    pid : pid,
                    childName :childName
                },
                success: function (data) {

                }
            })
        }

	</script>
	<!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>