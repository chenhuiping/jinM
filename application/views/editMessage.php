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
                    <a href="/jinM/notice/manageNotice">个人通知</a>
                    <span class="icon-angle-right"></span>
                </li>
                <li>
                    修改个人通知
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
                            <div class="caption"><i class="icon-reorder">发送通知</i></div>
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
                                <h3 class="form-section">个人通知</h3>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">标题</label>
                                            <div class="controls">
                                                <input type="text" class="m-wrap span8" placeholder="" id="noticeName" value="<?=$messageInfo['title']?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">时间<span class="required">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="m-wrap span8"  placeholder="2015-09-01" id="noticeTime"  value="<?=$messageInfo['date']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">通知内容</label>
                                            <div class="controls">
                                                <script id="editor" type="text/plain" style="width:1024px;height:500px;"><?=$messageInfo['content']?></script>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </form>


                            <div class="form-actions">
                                <button type="button" class="btn blue" onclick="edit()"><i class="icon-ok"></i> 修改</button>
                                <!--                                <button type="button" class="btn">返回</button>-->
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
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormSamples.init();
//            FormComponents.init();
//            var apip = $.Jcrop("#demo3");

        $('form :input').blur(function(){
            var $parent = $(this).parent();
            $parent.find(".formtips").remove();
            if( $(this).is('#noticeName') ){
                //alert("shopName");
                if( this.value==""){
                    var errorMsg = '请输入标题.';
                    $parent.append('<span class="formtips onError error">'+errorMsg+'</span>');
                }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                }
            }

            if( $(this).is('#noticeTime') ){
                //alert("shopName");
                if( this.value==""){
                    var errorMsg = '请输入时间.';
                    $parent.append('<span class="formtips onError error">'+errorMsg+'</span>');
                }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                }
            }

        })

    });




    function edit()
    {
        var noticeId = <?=$messageInfo['id']?>;
        var userId = <?=$messageInfo['userId']?>;
        var noticeName = document.getElementById('noticeName').value;
        var noticeTime = document.getElementById('noticeTime').value;
        var content =UE.getEditor('editor').getContent();
        //alert(content);
//        alert(noticeName);
//        alert(noticeTime);
        function push(id){
            var pushNoticeURL = "/jinM/notice/do_push";
            $.ajax({
                type: "post",
                url: pushNoticeURL,
                dataType: "json",
                data: {
                    id : id,
                    userId : userId,
                    noticeName : noticeName,
                    noticeTime : noticeTime,
                    content : content
                },
                success: function (data) {

                    //alert('成功');

                }
            })
        }

        var editNoticeURL = "/jinM/notice/editMessage_do";
        $.ajax({
            type: "post",
            url: editNoticeURL,
            dataType: "json",
            data: {
                noticeId : noticeId,
                userId : userId,
                noticeName : noticeName,
                noticeTime : noticeTime,
                content : content
            },
            success: function (data) {
                if(data.status)
                {
                    push(data.status);
                    alert('修改成功');
                    window.location.href='/jinM/notice/manageMessage';
                }
                else{
                    alert('修改失败');
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
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
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