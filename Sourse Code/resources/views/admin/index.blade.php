@extends('layouts.adminLayout')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <!--market updates updates-->
    <div class="market-updates" style="margin-top: 5rem">
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-1" style="display: flex; align-items: center">
                <div class="col-md-8 market-update-left">
                    <h3>{{$posts}}</h3>
                    <h4>Written Posts</h4>
                    <p>Other hand, we denounce</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-file-text-o"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-2" style="display: flex; align-items: center">
                <div class="col-md-8 market-update-left">
                    <h3>{{$users}}</h3>
                    <h4>Registered Users</h4>
                    <p>Other hand, we denounce</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-eye"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-3" style="display: flex; align-items: center">
                <div class="col-md-8 market-update-left">
                    <h3>{{$chats}}</h3>
                    <h4>Contact Messages</h4>
                    <p>Other hand, we denounce</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-envelope-o"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>

@endsection

