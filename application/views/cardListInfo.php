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
                    <a href="/jinM/event/manageJob">管理帖子</a>
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
                    <div class="caption"><i class="icon-edit"></i>管理帖子</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">

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
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <!--                                  <th style="width: 10%;text-align: center">顺序</th>-->
                            <th style="width: 10%;text-align: center">标题</th>
                            <th style="width: 20%;text-align: center">内容</th>
                            <th style="width: 20%;text-align: center">图片</th>
                            <th style="width: 6%;text-align: center">发帖人ID</th>
                            <th style="width: 10%;text-align: center">时间</th>
                            <th style="width: 10%;text-align: center">回复</th>

                            <th style="text-align:center;width: 8%">操作</th>
                            <!--                                <th style="text-align:center;width: 8%">置顶</th>-->
                            <!--                                <th style="text-align:center;width: 8%">热门设置</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cardListInfo as $cardList) { ?>
                            <tr>
                                <!--                                <td>--><?//=$cardList['stick']?><!--</td>-->
                                <td style="text-align: center" ><?=$cardList['title']?></td>
                                <td style="text-align: center" ><?=$cardList['content']?></td>
                                <td style="text-align: center" >
                                    <?php $photo=explode(",",$cardList['image']);
                                    //                                        var_dump($photo_thu);die;
                                    foreach ($photo as $image){
//                                            var_dump($img);die;
                                        if ($image!=""){ ?>
                                            <div class="gallery" style="width:50px;height: 50px;overflow: hidden;float: left;margin-right: 10px" ><li ><a  href="/hxyy/<?=$image?>" ><img src="/hxyy/<?=$image?>" /></a></li></div>
                                        <?php   }}  ?>
                                </td>
                                <td style="text-align: center"><?=$cardList['userId']?></td>
                                <td style="text-align: center"><?=$cardList['date']?></td>
                                <td style="text-align: center"><?php $count=$cardList['count(*)'];echo $count>0?$count:0;?></td>

                                <td class="center" style="text-align: center">
                                    <a class="edit" href="/jinM/card/card/<?=$cardList['id']?>">
                                        详情
                                    </a>
                                    <span>|</span>
                                    <a class="delete" href="/jinM/card/deleteCard/<?=$plateInfo['id']?>/<?=$cardList['id']?>">
                                        删除
                                    </a>
                                </td>
                                <!--                                    <td><a class="edit" href="javascript:stickCard(--><?//=$cardList['id']?><!--);">置顶</a></td>-->
                                <!--                                    <td><a class="hot"  id="send--><?//=$cardList['id']?><!--" href="javascript:hot(--><?//=$cardList['id']?><!--,--><?//=$cardList['tag']?><!--);">--><?php //if($cardList['tag']==1){echo "取消热门";}else{echo "设置热门";}?><!--</a></td>-->
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









