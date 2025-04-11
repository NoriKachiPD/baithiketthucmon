@extends('admin.master')

@section('title', 'Admin Dashboard')

@section('favicon', asset('images/Admin.png'))

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            {{-- Page Heading --}}
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard
                        <small>Overview</small>
                    </h1>
                </div>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Quick Access Boxes --}}
            <div class="row">

                {{-- Category Box --}}
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.category.list') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- User Box --}}
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.user.list') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Product Box --}}
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cubes fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.product.list') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Contact Box --}}
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Contacts</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.contact.list') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Order Box --}}
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Orders</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.order.orderlist') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Welcome Message --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Welcome to the <strong><a href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: inherit;"> Admin Panel</a></strong>. Use the sidebar to navigate between different sections.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection