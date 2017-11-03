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
                            <a href="/jinM/shop/manage">管理店铺</a>
                            <i class="icon-angle-right"></i>
                        </li>
<!--                        <li>-->
<!--                            <a href="#">Data Tables</a>-->
<!--                            <i class="icon-angle-right"></i>-->
<!--                        </li>-->
<!--                        <li><a href="#">Editable Tables</a></li>-->
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
                            <div class="caption"><i class="icon-edit"></i>管理店铺</div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="btn-group">
                                    <button id="" class="btn green" onclick="javascript:location.href='/jinM/shop/addShop';">
                                        Add New <i class="icon-plus"></i>
                                    </button>
                                </div>
<!--                                <div class="btn-group pull-right">-->
<!--                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>-->
<!--                                    </button>-->
<!--                                    <ul class="dropdown-menu pull-right">-->
<!--                                        <li><a href="#">Print</a></li>-->
<!--                                        <li><a href="#">Save as PDF</a></li>-->
<!--                                        <li><a href="#">Export to Excel</a></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>顺序</th>
                                    <th>头像</th>
                                    <th>店铺名称</th>
                                    <th>电话</th>
                                    <th>地址</th>
                                    <th>特色服务</th>
                                    <th>店铺简介</th>
                                    <th>评论</th>
                                    <th>置顶</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Album</th>

                                </tr>
                                </thead>
                                <tbody>
                               <?php foreach($shopList as $shop) { ?>
                                <tr >
                                    <td><?=$shop['stick']?></td>
                                    <td><img src="<?php if($shop['img']!=""){echo "/jinM/".$shop['img'];} ?>" style="height: 2em;width: 2em;" /></td>
                                    <td><?=$shop['name']?></td>
                                    <td><?=$shop['tel']?></td>
                                    <td><?=$shop['address']?></td>
                                    <td><?=$shop['intro']?></td>
                                    <td><?=$shop['desc']?></td>
                                    <td><a class="edit" href="javascript:location.href='/jinM/shop/editComm/<?=$shop['id']?>';">管理评论</a></td>
                                    <td><a class="edit" href="javascript:stickShop(<?=$shop['id']?>);">置顶</a></td>
                                    <td><a class="edit" href="javascript:location.href='/jinM/shop/editShop/<?=$shop['id']?>';">Edit</a></td>
                                    <td><a class="delete" href="javascript:deleteShop(<?=$shop['id']?>);">Delete</a></td>
                                    <td><a class="delete" href="/jinM/shop/album/<?=$shop['id']?>">查看相册</a></td>
                                </tr>
                                <?php   } ?>

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

    function deleteShop(shopId)
    {
        var deleteShopURL = "/jinM/shop/delete";
        $.ajax({
            type: "post",
            url: deleteShopURL,
            dataType: "json",
            data: {
                shopId : shopId
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

    function stickShop(shopId)
    {
        var stickShopURL ="/jinM/shop/stickShop";
        $.ajax({
            type: "post",
            url: stickShopURL,
            dataType: "json",
            data: {
                shopId : shopId
            },
            success: function (data) {
                if(data.status==true){
                    alert('置顶成功');
                    location.reload(true);
                }
                else{
                    alert(data.error);
                }
            }
        })
    }

</script>
</body>
<!-- END BODY -->
</html>