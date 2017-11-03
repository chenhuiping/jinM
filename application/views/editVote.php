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
                    <a href="/jinM/event/manageJob">管理投票</a>
                    <span class="icon-angle-right"></span>
                </li>
                <li>
                    修改投票信息
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
                            <div class="caption"><i class="icon-reorder">修改投票信息</i></div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <h3 class="form-section">投票信息</h3>
                            <div class="row-fluid">
                                <div class="span6 ">
                                    <div class="control-group">
                                        <label class="control-label">题号</label>
                                        <div class="controls">
                                            <input type="text" class="m-wrap span12"  id="voteQid" value="<?=$voteInfo['qid']?>" disabled>
                                            <span class="help-block">This is inline help</span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="span6 ">
                                    <div class="control-group">
                                        <label class="control-label">选项名称<span class="required">*</span></label>
                                        <div class="controls">
                                            <!--                                                                <div class="input-append date form_meridian_datetime" data-date="--><?//=date('Y-m-d')?><!--T--><?//=date('H:i:s')?><!--Z">-->
                                            <!--                                                                    <input size="16" type="text" value="" readonly class="m-wrap" name="eventTime" id="eventTime">-->
                                            <!--                                                                    <span class="add-on"><i class="icon-remove"></i></span>-->
                                            <!--                                                                    <span class="add-on"><i class="icon-calendar"></i></span>-->
                                            <!--                                                                </div>-->
                                            <input type="text" class="m-wrap span8"  id="voteContent" value="<?=$voteInfo['acontent']?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row-fluid">
                                <div class="span6 ">
                                    <div class="control-group">
                                        <label class="control-label">票数</label>
                                        <div class="controls">
                                            <input type="text" class="m-wrap span12"  id="voteNum" value="<?=$voteInfo['num']?>">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="button" class="btn blue" onclick="edit()"><i class="icon-ok"></i> Save</button>
<!--                                <button type="button" class="btn">Cancel</button>-->
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
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>

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
<script src="assets/scripts/form-samples.js"></script>

<script src="assets/scripts/form-image-crop.js"></script>
<script src="assets/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="assets/scripts/form-components.js"></script>

<script type="text/javascript" charset="utf-8" src="assets/js/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/ueditor.all.min.js"> </script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormSamples.init();
        FormComponents.init();
//            var apip = $.Jcrop("#demo3");

    });

    $('#upload-btn').click(function(){
//            var file = $("#userfile").val();
//            var FileExt=file.replace(/.+\./,"");   //正则表达式获取后缀
        $('#uploadForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                alert("上传成功");
                document.getElementById('imgPath').value=data.thumb_path;
                document.getElementById('imagePath').value=data.path
            }
        });
    });


    function edit()
    {
        var voteQid = <?=$voteInfo['qid']?>;
        var voteAid = <?=$voteInfo['value']?>;
        var voteContent = document.getElementById('voteContent').value;
        var voteNum = document.getElementById('voteNum').value;
//        var address = document.getElementById('address').value;
//        var category =document.getElementById('category').value;
//        var imagePath =document.getElementById('imagePath').value;
//        var imgPath =document.getElementById('imgPath').value;
//        var content =UE.getEditor('editor').getContent();
        //alert(eventTime);

        var editEventURL = "/jinM/event/editVote_do/<?=$voteInfo['qid']?>/<?=$voteInfo['value']?>";
        $.ajax({
            type: "post",
            url: editEventURL,
            dataType: "json",
            data: {
                voteQid : voteQid,
                voteAid : voteAid,
                voteContent : voteContent,
                voteNum : voteNum
            },
            success: function (data) {
                if(data.status==true)
                {
                    alert('Finished! Hope you like it :)');
                    window.location.href='/jinM/event/manageVote';
                }
                else{
                    alert('上传失败');
                }
            }
        })
    }



</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码','');
        UE.getEditor('editor').execCommand('insertHtml',value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>