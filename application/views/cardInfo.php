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
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/jinM/event/manageJob">管理回帖</a>
                    <span class="icon-angle-right"></span>
                </li>
            </ul>
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
                    <div class="caption"><i class="icon-edit"></i>管理回帖</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th style="text-align: center">回帖内容</th>
                            <th style="text-align: center">图片</th>
                            <th style="text-align: center">用户Id</th>
                            <th style="text-align: center" >时间</th>

                            <th style="text-align: center;width: 10%">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($followCardList as $followCard) { ?>
                            <tr>
                                <td style="text-align: center" ><?=$followCard['content']?></td>
                                <!--                                        <td class="center" style="width:100px;height: 100px;">--><?php //if($followCard['photo']!=''){ ?><!--<a href="" ><img src="/hxyy/--><?//=$followCard['photo_thu']?><!--" /></a> --><?php //} ?><!--</td>-->
                                <td style="text-align: center" >
                                    <?php $photo=explode(",",$followCard['image']);
                                    //                                        var_dump($photo_thu);die;
                                    foreach ($photo as $image){
//                                            var_dump($img);die;
                                        if ($image!=""){ ?>
                                            <div class="gallery" style="width:50px;height: 50px;overflow: hidden;float: left;margin-right: 10px" ><li ><a  href="/jinM/<?=$image?>" ><img src="/jinM/<?=$image?>" /></a></li></div>
                                        <?php   }}  ?>
                                </td>
                                <td style="text-align: center" ><?=$followCard['userId']?></td>
                                <td style="text-align: center" ><?=$followCard['date']?></td>
                                <td style="text-align: center" >

                                    <a class="delete" href="/jinM/card/deleteFollowCard/<?=$cardInfo['id']?>/<?=$followCard['id']?>">
                                       删除
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

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











