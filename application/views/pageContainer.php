<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/28 0028
 * Time: 10:45
 */
?>

<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search">
                    <div class="input-box">
                        <a href="javascript:;" class="remove"></a>
                        <input type="text" placeholder="Search..." />
                        <input type="button" class="submit" value=" " />
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start ">
                <a href="/jinM/admin/index">
                    <i class="icon-home"></i>
                    <span class="title">Home Page</span>
                </a>
            </li>

            <li >
                <a href="javascript:;">
                    <i class="icon-table"></i>
                    <span class="title">Event</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/jinM/event/addEvent">
                            Add Event</a>
                    </li>
                    <li >
                        <a href="/jinM/event/manage">
                            Manage Event</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                    <i class="icon-cogs"></i>
                    <span class="title">Notice</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/jinM/notice/allNotices">
                            For All</a>
                    </li>
                    <li >
                        <a href="/jinM/notice/manageNotice">
                            Manage All Notice</a>
                    </li>
                    <li >
                        <a href="/jinM/notice/personalNotice">
                            Personal</a>
                    </li>
                    <li >
                        <a href="/jinM/notice/manageMessage">
                        Manage Personal Notice</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">Job</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/jinM/event/addJob">
                            Add Job</a>
                    </li>
                    <li >
                        <a href="/jinM/event/manageJob">
                            Manage Job</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                    <i class="icon-book"></i>
                    <span class="title">Magazine</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/jinM/event/addIssue">
                            Add Magazine</a>
                    </li>
                    <li >
                        <a href="/jinM/event/manageIssue">
                            Manage Magezine</a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                    <i class="icon-inbox"></i>
                    <span class="title">Advertising</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/jinM/adimg/addAdimg">
                            Add Image</a>
                    </li>
                    <li >
                        <a href="/jinM/adimg/addAdvert">
                            Add Index Picture</a>
                    </li>
                    <li >
                        <a href="/jinM/adimg/show">
                        Delete Picture</a>
                    </li>
                </ul>
            </li>

<!--            <li >-->
<!--                <a href="javascript:;">-->
<!--                    <i class="icon-table"></i>-->
<!--                    <span class="title">Vote</span>-->
<!--                    <span class="arrow "></span>-->
<!--                </a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li >-->
<!--                        <a href="/jinM/event/manageVote">-->
<!--                            Vote List</a>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!--            </li>-->

            <li >
                <a href="javascript:;">
                    <i class="icon-table"></i>
                    <span class="title">Feedback</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/jinM/feedback/show?meanuId=8"  id="meanu8">
                            Audit Feedback</a>
                    </li>
                    <li >
                        <a href="/jinM/feedback/showHistory?meanuId=9" id="meanu8">
                            Historical Feedback</a>
                    </li>
                </ul>
            </li>


<!--            <li >-->
<!--                <a href="javascript:;">-->
<!--                    <i class="icon-table"></i>-->
<!--                    <span class="title">帖子</span>-->
<!--                    <span class="arrow "></span>-->
<!--                </a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li >-->
<!--                        <a href="/jinM/card/manageCard">-->
<!--                            管理板块</a>-->
<!--                    </li>-->
<!--                    <li >-->
<!--                        <a href="/jinM/card/addPlate">-->
<!--                            添加板块</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Portlet Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here will be a configuration form</p>
            </div>
        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->