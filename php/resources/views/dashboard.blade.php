@extends('layout.main')

@section('title', '首页')

@section('content')
<div class="main-container">
    <div class="container-fluid">
        @include('Admin.layout.breadcrumb')

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="mini-stats-widget full-block-mini-chart">
                    <div class="mini-stats-top">
                        <span class="mini-stats-value">6,000</span>
                        <span class="mini-stats-label">Visitors Today</span>
                    </div>
                    <div class="mini-stats-chart">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="80" data-width="100%" data-line-width="2" data-min-spot-color="#e65100" data-max-spot-color="#ffb300" data-line-color="#26a69a" data-spot-color="#00838f" data-fill-color="#26a69a" data-highlight-line-color="#00acc1" data-highlight-spot-color="#ff8a65" data-spot-radius="false" data-data="[450,480,500,590,600,640,560,530,500,540, 570,600,550,520,510,500,510,540,580,590,580,564,600,700]">
                        </div>
                    </div>
                    <div class="mini-stats-bottom w_bg_teal">
                        <span><i class="ico-arrow-up"></i></span> Increase <span>10% </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mini-stats-widget">
                    <div class="mini-stats-top">
                        <span class="mini-stats-value">4,000</span>
                        <span class="mini-stats-label">Unique Visitors</span>
                    </div>
                    <div class="mini-stats-chart">
                        <div class="sparkline" data-type="bar" data-resize="true" data-height="80" data-width="90%" data-bar-color="#26c6da" data-bar-spacing="3" data-bar-width="4" data-data="[5,10,15,20,25,30,25,20,30,50,40,30,20,10,5]">
                        </div>
                    </div>
                    <div class="mini-stats-bottom">
                        <span><i class="ico-arrow-up"></i></span> Increase <span>20% </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mini-stats-widget">
                    <div class="mini-stats-top">
                        <span class="mini-stats-value">2,000</span>
                        <span class="mini-stats-label">Repeated Visitors</span>
                    </div>
                    <div class="mini-stats-chart">
                        <div class="sparkline" data-type="bar" data-resize="true" data-height="80" data-width="90%" data-bar-color="#303f9f" data-bar-spacing="3" data-bar-width="4" data-data="[10,15,20,25,30,40,50,60,70,60,40,30,40,50,40]">
                        </div>
                    </div>
                    <div class="mini-stats-bottom">
                        <span><i class="ico-arrow-up"></i></span> Increase <span>30% </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mini-stats-widget full-block-mini-chart">
                    <div class="mini-stats-top">
                        <span class="mini-stats-value">12,200</span>
                        <span class="mini-stats-label">New Downloads</span>
                    </div>
                    <div class="mini-stats-chart">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="80" data-width="100%" data-line-width="2" data-min-spot-color="#e65100" data-max-spot-color="#ffb300" data-line-color="#b388ff" data-spot-color="#00838f" data-fill-color="#b388ff" data-highlight-line-color="#00acc1" data-highlight-spot-color="#ff8a65" data-spot-radius="false" data-data="[450,480,500,590,600,640,560,530,500,540, 570,600,550,520,510,500,510,540,580,590,580,564,600,700]">
                        </div>
                    </div>
                    <div class="mini-stats-bottom w_bg_deep_purple">
                        <span><i class="ico-arrow-up"></i></span> Increase <span>10% </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-stat-box">
            <div class="row">
                <div class="col-md-3 right-light-border col-sm-6">
                    <div class="stat-w-wrap ca-center number-rotate">
                        <span class="stat-w-title">Orders Today</span>
                        <a href="#" class="ico-cirlce-widget w_bg_green">
                            <span><i class="fa fa-cart-plus"></i></span>
                        </a>
                        <div class="w-meta-info">
                            <span class="w-meta-value number-animate" data-value="330" data-animation-duration="1500">0</span>
                            <span class="w-meta-title">New Orders</span>
                            <span class="w-previos-stat">Last Day : 210</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 right-light-border col-sm-6">
                    <div class="stat-w-wrap ca-center combine-stats">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="stat-w-title">Earnings Today</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <a href="#" class="ico-cirlce-widget w_bg_blue">
                                    <span><i class="fa fa-money"></i></span>
                                </a>
                                <div class="w-meta-info w-currency">
                                    <span class="w-meta-value number-animate" data-value="3894" data-animation-duration="1500">0</span>
                                    <span class="w-meta-title">Direct Earning</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="#" class="ico-cirlce-widget w_bg_brown">
                                    <span><i class="ico-price-tag"></i></span>
                                </a>
                                <div class="w-meta-info">
                                        <span class="w-meta-value w-currency">
                                        <span class="w-meta-value number-animate" data-value="2100" data-animation-duration="1500">0</span></span>
                                    <span class="w-meta-title">Affiliate Earning</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="w-meta-info">
                                    <span class="w-previos-stat">Last Day : $3,510</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="ca-center stat-w-wrap">
                        <span class="stat-w-title">This Week Earnings</span>
                        <div id="weekly-earning">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="w-info-graph">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="w-info-chart">
                                <div class="w-info-chart-header">
                                    <h2>23,320 Items Sold</h2>
                                    <p>
                                        This is a income chart for the Matmix products
                                    </p>
                                </div>
                                <div class="mini-chart-list">
                                    <ul>
                                        <li>
                                            <span class="epie-chart" data-percent="40" data-barcolor="#00acc1" data-tcolor="#e0e0e0" data-scalecolor="#e0e0e0" data-linecap="butt" data-linewidth="3" data-size="80" data-animate="2000"><span class="percent"></span>
                                            </span>
                                            <span class="chart-sub-title">Direct</span>
                                        </li>
                                        <li>
                                            <span class="epie-chart" data-percent="35" data-barcolor="#ffb74d" data-tcolor="#e0e0e0" data-scalecolor="#e0e0e0" data-linecap="butt" data-linewidth="3" data-size="80" data-animate="2000"><span class="percent"></span>
                                            </span>
                                            <span class="chart-sub-title">Affiliate</span>
                                        </li>
                                        <li>
                                            <span class="epie-chart" data-percent="25" data-barcolor="#4caf50" data-tcolor="#e0e0e0" data-scalecolor="#e0e0e0" data-linecap="butt" data-linewidth="3" data-size="80" data-animate="2000"><span class="percent"></span>
                                            </span>
                                            <span class="chart-sub-title">Renew</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="line-chart-container">
                                    <div class="sparkline" data-type="line" data-resize="true" data-height="200" data-width="100%" data-line-width="1" data-line-color="#00acc1" data-spot-color="#00838f" data-fill-color="rgba(240,240,240,0.5)" data-highlight-line-color="#e1e5e9" data-highlight-spot-color="#ff8a65" data-spot-radius="4" data-data="[500,590,620,690,700,740,660,530,600,640, 770,600,550,520,610,650,780,690,680,790,680,664,600,800]" data-stack-line-color="#ffb74d" data-stack-fill-color="rgba(190,100,10,.08)" data-stack-spot-color="#ef6c00" data-stack-spot-radius="4" data-compositedata="[450,480,500,590,600,640,560,530,500,540, 570,600,550,520,510,500,510,540,580,590,580,564,600,700]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="w-info-chart-meta">
                                <h2>Alltime Earning</h2>
                                <span class="info-meta-value">$90,808</span>
                                <span class="w-meta-title">Traffic Source</span>
                                <div class="progress-wrap">
                                    <div class="clearfix progress-meta">
                                        <span class="pull-left progress-label">google.com</span><span class="pull-right progress-percent label label-info"></span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" data-progress="40">
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="clearfix progress-meta">
                                        <span class="pull-left progress-label">yahoo.com</span><span class="pull-right progress-percent label label-danger"></span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" data-progress="25">
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="clearfix progress-meta">
                                        <span class="pull-left progress-label">jaman.me</span><span class="pull-right progress-percent label label-primary"></span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-progress="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="clearfix progress-meta">
                                        <span class="pull-left progress-label">envato.com</span><span class="pull-right progress-percent label label-success"></span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-progress="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="clearfix progress-meta">
                                        <span class="pull-left progress-label">Others</span><span class="pull-right progress-percent label label-warning"></span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" data-progress="5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-widget widget-module">
                    <div class="widget-head clearfix">
                        <span class="h-icon"><i class="fa fa-table"></i></span>
                        <h4>New Members</h4>
                        <ul class="widget-action-bar pull-right">
                            <li>
                                <div class="widget-switch">
                                    <input type="checkbox" class="w-on-off" checked/>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-container">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover matmix-dt">
                                <thead>
                                <tr>
                                    <th class="tc-center">
                                        <input class="tc-check-all" type="checkbox" value="0">
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th class="tc-center">
                                        Thumb
                                    </th>
                                    <th class="tc-center">
                                        Access
                                    </th>
                                    <th class="tc-center">
                                        Status
                                    </th>
                                    <th class="tc-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tc-center">
                                        <input type="checkbox" class="tc-check" value="0">
                                    </td>
                                    <td>
                                        Amery
                                    </td>
                                    <td class="tc-center">
                                        <a href="#" class="user-td-thumb"><img src="/images/avatar/adellecharles.jpg" alt="user">
                                        </a>
                                    </td>
                                    <td class="tc-center">
                                        <label class="label label-info">Paid</label>
                                        <label class="label label-warning">Pending</label>
                                    </td>
                                    <td class="tc-center">
                                        <select class="form-control input-sm status-select">
                                            <option>Select</option>
                                            <option>Approve</option>
                                            <option>Reject</option>
                                            <option>Suspend</option>
                                            <option>Pending</option>
                                        </select>
                                    </td>
                                    <td class="tc-center">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-default btn-sm m-user-edit">Edit</a>
                                                <a href="#" class="btn btn-default btn-sm m-user-delete">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tc-center">
                                        <input type="checkbox" class="tc-check" value="0">
                                    </td>
                                    <td>
                                        Scott
                                    </td>
                                    <td class="tc-center">
                                        <a href="#" class="user-td-thumb"><img src="/images/avatar/bobbyjkane.jpg" alt="user">
                                        </a>
                                    </td>
                                    <td class="tc-center">
                                        <label class="label label-default">Free</label>
                                        <label class="label label-danger">Suspended</label>
                                    </td>
                                    <td class="tc-center">
                                        <select class="form-control input-sm status-select">
                                            <option>Select</option>
                                            <option>Approve</option>
                                            <option>Reject</option>
                                            <option>Suspend</option>
                                            <option>Pending</option>
                                        </select>
                                    </td>
                                    <td class="tc-center">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-default btn-sm m-user-edit">Edit</a>
                                                <a href="#" class="btn btn-default btn-sm m-user-delete">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tc-center">
                                        <input type="checkbox" class="tc-check" value="0">
                                    </td>
                                    <td>
                                        Eric
                                    </td>
                                    <td class="tc-center">
                                        <a href="#" class="user-td-thumb"><img src="/images/avatar/chexee.jpg" alt="user">
                                        </a>
                                    </td>
                                    <td class="tc-center">
                                        <label class="label label-info">Gold</label>
                                        <label class="label label-success">Approved</label>
                                    </td>
                                    <td class="tc-center">
                                        <select class="form-control input-sm status-select">
                                            <option>Select</option>
                                            <option>Approve</option>
                                            <option>Reject</option>
                                            <option>Suspend</option>
                                            <option>Pending</option>
                                        </select>
                                    </td>
                                    <td class="tc-center">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-default btn-sm m-user-edit">Edit</a>
                                                <a href="#" class="btn btn-default btn-sm m-user-delete">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tc-center">
                                        <input type="checkbox" class="tc-check" value="0">
                                    </td>
                                    <td>
                                        Vaughan
                                    </td>
                                    <td class="tc-center">
                                        <a href="#" class="user-td-thumb"><img src="/images/avatar/littlenono.jpg" alt="user">
                                        </a>
                                    </td>
                                    <td class="tc-center">
                                        <label class="label label-default">Free</label>
                                        <label class="label label-warning">Pending</label>
                                    </td>
                                    <td class="tc-center">
                                        <select class="form-control input-sm status-select">
                                            <option>Select</option>
                                            <option>Approve</option>
                                            <option>Reject</option>
                                            <option>Suspend</option>
                                            <option>Pending</option>
                                        </select>
                                    </td>
                                    <td class="tc-center">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-default btn-sm m-user-edit">Edit</a>
                                                <a href="#" class="btn btn-default btn-sm m-user-delete">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tc-center">
                                        <input type="checkbox" class="tc-check" value="0">
                                    </td>
                                    <td>
                                        Jeremy
                                    </td>
                                    <td class="tc-center">
                                        <a href="#" class="user-td-thumb"><img src="/images/avatar/coreyweb.jpg" alt="user">
                                        </a>
                                    </td>
                                    <td class="tc-center">
                                        <label class="label label-primary">Premium</label>
                                        <label class="label label-default">Waiting for Review</label>
                                    </td>
                                    <td class="tc-center">
                                        <select class="form-control input-sm status-select">
                                            <option>Select</option>
                                            <option>Approve</option>
                                            <option>Reject</option>
                                            <option>Suspend</option>
                                            <option>Pending</option>
                                        </select>
                                    </td>
                                    <td class="tc-center">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-default btn-sm m-user-edit">Edit</a>
                                                <a href="#" class="btn btn-default btn-sm m-user-delete">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="box-widget widget-module">
                    <div class="widget-head clearfix">
                        <span class="h-icon"><i class="fa fa-phone"></i></span>
                        <h4>Contact</h4>
                        <ul class="widget-action-bar pull-right">
                            <li><span class="widget-collapse waves-effect w-collapse"><i class="fa fa-angle-down"></i></span>
                            </li>
                            <li><span class="widget-remove waves-effect w-remove"><i class="ico-cross"></i></span>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-container">
                        <div class="w-contact-widget">
                            <div class="w-contact-list">
                                <div class="w-contact-list-item">
                                    <div class="w-contact-thumbnail">
                                        <a href="#"><img src="/images/avatar/chexee.jpg" alt="avatar">
                                        </a>
                                    </div>
                                    <div class="w-contact-info">
                                        <h4><a href="#"> Felicia J. Elliott</a></h4>
                                        <div class="user-contact-card">
                                            <a href="#" data-tooltip="tooltip" data-placement="top" title="info@jaman.me"><i class="fa fa-envelope-o"></i></a><a href="#" data-tooltip="tooltip" data-placement="top" title="121 King St, Melbourne VIC 3000, Australia"><i class="fa fa-map-marker"></i></a><a href="#" data-tooltip="tooltip" data-placement="top" title="+880198394749"><i class="fa fa-phone"></i></a>
                                        </div>
                                    </div>
                                    <div class="w-contact-action">
                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                        <a href="#"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="w-contact-list-item">
                                    <div class="w-contact-thumbnail">
                                        <a href="#"><img src="/images/avatar/allisongrayce.jpg" alt="avatar">
                                        </a>
                                    </div>
                                    <div class="w-contact-info">
                                        <h4><a href="#"> Juliet J. Calvin</a></h4>
                                        <div class="user-contact-card">
                                            <a href="#" data-tooltip="tooltip" data-placement="top" title="info@jaman.me"><i class="fa fa-envelope-o"></i></a><a href="#" data-tooltip="tooltip" data-placement="top" title="121 King St, Melbourne VIC 3000, Australia"><i class="fa fa-map-marker"></i></a><a href="#" data-tooltip="tooltip" data-placement="top" title="+880198394749"><i class="fa fa-phone"></i></a>
                                        </div>
                                    </div>
                                    <div class="w-contact-action">
                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                        <a href="#"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="w-contact-list-item">
                                    <div class="w-contact-thumbnail">
                                        <a href="#"><img src="/images/avatar/bobbyjkane.jpg" alt="avatar">
                                        </a>
                                    </div>
                                    <div class="w-contact-info">
                                        <h4><a href="#"> Sherri J. Buchanan</a></h4>
                                        <div class="user-contact-card">
                                            <a href="#" data-tooltip="tooltip" data-placement="top" title="info@jaman.me"><i class="fa fa-envelope-o"></i></a><a href="#" data-tooltip="tooltip" data-placement="top" title="121 King St, Melbourne VIC 3000, Australia"><i class="fa fa-map-marker"></i></a><a href="#" data-tooltip="tooltip" data-placement="top" title="+880198394749"><i class="fa fa-phone"></i></a>
                                        </div>
                                    </div>
                                    <div class="w-contact-action">
                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                        <a href="#"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="box-widget widget-module">
                    <div class="widget-head clearfix">
                        <span class="h-icon"><i class="fa fa-users"></i></span>
                        <h4>Users</h4>
                        <ul class="widget-action-bar pull-right">
                            <li><span class="waves-effect w-reload"><i class="fa fa-spinner"></i></span>
                            </li>
                            <li><span class="widget-remove waves-effect w-remove"><i class="ico-cross"></i></span>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-container">
                        <div class="w-contact-widget">
                            <div class="w-user-list">
                                <div class="w-user-list-item">
                                    <div class="w-user-thumbnail">
                                        <a href="#"><img src="/images/avatar/allisongrayce.jpg" alt="user">
                                        </a>
                                    </div>
                                    <div class="w-user-info">
                                        <ul>
                                            <li>Name:<span><a href="#">Jean J. Thomas <span class="label label-default">Free</span></a></span>
                                            </li>
                                            <li>Date: <span>18th June 2015</span>
                                            </li>
                                            <li>Package: <span>Basic</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-user-action">
                                        <a href="#" data-tooltip="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#" data-tooltip="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="w-user-list-item">
                                    <div class="w-user-thumbnail">
                                        <a href="#"><img src="/images/avatar/bobbyjkane.jpg" alt="user">
                                        </a>
                                    </div>
                                    <div class="w-user-info">
                                        <ul>
                                            <li>Name:<span><a href="#">Michael H. Russell <span class="label label-default">Free</span></a></span>
                                            </li>
                                            <li>Date: <span>18th June 2015</span>
                                            </li>
                                            <li>Package: <span>Basic</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-user-action">
                                        <a href="#" data-tooltip="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#" data-tooltip="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="w-user-list-item">
                                    <div class="w-user-thumbnail">
                                        <a href="#"><img src="/images/avatar/coreyweb.jpg" alt="user">
                                        </a>
                                    </div>
                                    <div class="w-user-info">
                                        <ul>
                                            <li>Name:<span><a href="#">Tyler B. Falcon <span class="label label-success">Paid</span></a></span>
                                            </li>
                                            <li>Date: <span>18th June 2015</span>
                                            </li>
                                            <li>Package: <span>Gold</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-user-action">
                                        <a href="#" data-tooltip="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#" data-tooltip="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-widget widget-module">
                    <div class="widget-head clearfix">
                        <span class="h-icon"><i class="fa fa-cart-arrow-down"></i></span>
                        <h4>Order Received</h4>
                        <ul class="widget-action-bar pull-right">
                            <li><span class="waves-effect w-reload"><i class="fa fa-spinner"></i></span>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-container">
                        <div class="table-responsive">
                            <table class="table w-order-list table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Order ID
                                    </th>
                                    <th>
                                        Titile
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="#">#36542</a>
                                    </td>
                                    <td>
                                        Gold
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        $50/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">#38544</a>
                                    </td>
                                    <td>
                                        Silver
                                    </td>
                                    <td>
                                        <span class="label label-success">Confirmed</span>
                                    </td>
                                    <td>
                                        $20/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#"> #39545</a>
                                    </td>
                                    <td>
                                        <span>Platinum</span>
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        $80/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#"> #39548</a>
                                    </td>
                                    <td>
                                        <span>Platinum</span>
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        $80/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#"> #39550</a>
                                    </td>
                                    <td>
                                        <span>Platinum</span>
                                    </td>
                                    <td>
                                        <span class="label label-danger">canceled</span>
                                    </td>
                                    <td>
                                        $80/m
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_related')
<!--CHARTS-->
<script src="/js/chart/sparkline/jquery.sparkline.js"></script>
<script src="/js/chart/easypie/jquery.easypiechart.min.js"></script>
<script src="/js/chart/flot/excanvas.min.js"></script>
<script src="/js/chart/flot/jquery.flot.min.js"></script>
<script src="/js/chart/flot/jquery.flot.time.min.js"></script>
<script src="/js/chart/flot/jquery.flot.stack.min.js"></script>
<script src="/js/chart/flot/jquery.flot.axislabels.js"></script>
<script src="/js/chart/flot/jquery.flot.resize.min.js"></script>
<script src="/js/chart/flot/jquery.flot.tooltip.min.js"></script>
<script src="/js/chart/flot/jquery.flot.spline.js"></script>
<script src="/js/chart/flot/jquery.flot.pie.min.js"></script>
<script src="/js/chart.init.js"></script>
<script src="/js/smart-resize.js"></script>
<script src="/js/matmix.init.js"></script>
@endsection
