<?php include "head.php" ?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
<link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css" />
<!-- END PAGE LEVEL STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
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
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                <!--                        Editable Tables <small>editable table samples</small>-->
            </h3>
<!--            <ul class="breadcrumb">-->
<!--                <li>-->
<!--                    <i class="icon-home"></i>-->
<!--<!--                    <a href="/jinM/event/manageJob">管理工作</a>-->
<!--                    <span class="icon-angle-right"></span>-->
<!--                </li>-->
<!--            </ul>-->
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-edit"></i>History Feedback</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
<!--                        <div class="btn-group">-->
<!--                            <button id="" class="btn green" onclick="javascript:location.href='/jinM/event/addJob';">-->
<!--                                Add New <i class="icon-plus"></i>-->
<!--                            </button>-->
<!--                        </div>-->
                        <div class="btn-group pull-right">
                            <!--                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>-->
                            <!--                                    </button>-->
                            <!--                                    <ul class="dropdown-menu pull-right">-->
                            <!--                                        <li><a href="#">Print</a></li>-->
                            <!--                                        <li><a href="#">Save as PDF</a></li>-->
                            <!--                                        <li><a href="#">Export to Excel</a></li>-->
                            <!--                                    </ul>-->
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>UserName </th>
                            <!--                            <th>图片</th>-->
                            <th>Content</th>
                            <th>Images</th>
                            <th>Time</th>
                            <th>Audit Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($feedbackList as $feedback)
                        {
                            ?>

                            <tr id="tomb_fo_tr_0" >
                                <td style="width: 6%;text-align: center">
                                    <?php
                                    foreach($userList as $user)
                                    {
                                        if($user['id']==$feedback['userId']) echo $user['nickName'];
                                    }
                                    ?>
                                </td>
                                <td style="width: 40%"><?=$feedback['content']?></td>
                                <td style="width: 30%">
                                    <?php
                                    $str=$feedback['image'];//print_r(explode(',', $str));die;
                                    $pathList =explode(',', $str);
                                    //print_r($path);
                                    foreach($pathList as $path)
                                    { if($path!=null){
                                        ?>
                                        <a href="/jinM/<?=$path?>"><img src="/jinM/<?=$path?>" style="width: 100px;height: 100px;"></a>
                                    <?php }} ?>

                                </td>
                                <td><?=$feedback['date']?></td>
                                <td>
                                    <!--   <li class="btn mini purple ajaxsub"><i class="icon-edit"></i> 编辑</li>-->

                                    <a href="/jinM/feedback/del?id=<?=$feedback['id']?>"  class="btn mini purple ajaxsub" ><i class="icon-trash"></i> Read</a>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<?php include "footer.php"?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/table-editable.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        TableEditable.init();
    });

    function deleteEvent(eventId)
    {
        var deleteEventURL = "/jinM/event/delete";
        $.ajax({
            type: "post",
            url: deleteEventURL,
            dataType: "json",
            data: {
                eventId : eventId
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
</body>
<!-- END BODY -->
</html>