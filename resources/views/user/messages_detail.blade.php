@extends('user.layouts.master')

@section('styles')
    {{--styles--}}
@endsection

@section('content')


    <div id="smenu">
        <img src="img/menu.png" alt="Menu" class="i-menu"/>
        <a href="http://raovat321.com/dang-nhap" onclick="alert('Bạn chưa đăng nhập, hãy đăng nhập để đăng tin');">
            <i class="fa fa-pencil" style="
				    display:  inline-block;
				    font-size: 14px;
				    padding-top: -10px;
				"></i>
            <span style="vertical-align: middle;">Publish your ad for free</span>
        </a>

    </div>
    <div id="menus">
        <div class="smenu-menu">
            <ul id="main-menus" class="sm sm-blue">
                <li>
                    <a href="{{route("home")}}">
                        Home </a>
                </li>
                <li>
                    <a href="bat-dong-san">
                        Bất động sản </a>
                </li>
                <li>
                    <a href="viec-lam">
                        Việc làm </a>
                </li>
                <li>
                    <a href="o-to">
                        Ô tô </a>
                </li>
                <li>
                    <a href="dien-tu-dien-may">
                        Điện tử - Điện máy </a>
                </li>
                <li>
                    <a href="xe-may">
                        Xe máy </a>
                </li>
                <li>
                    <a href="tuyen-sinh-dao-tao">
                        Tuyển sinh - Đào tạo </a>
                </li>
                <li>
                    <a href="dich-vu">
                        Dịch vụ </a>
                </li>
                <li>
                    <a href="do-dung">
                        Đồ dùng </a>
                </li>
                <li>
                    <a href="cong-dong">
                        Cộng đồng </a>
                </li>
                <li>
                    <a href="tim-doi-tac">
                        Tìm đối tác </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="center" id="hlcenter" style="; border: none;">
        <div id="container" class="w-clear">
            <div class="row" style="margin-right: -5px;margin-left: -5px;">
                <div class="col-md-2 hidden-xs" id="halink-left" style="padding-left: 5px;padding-right: 5px;">
                    <div class="list_item_panel">
                        <ul>
                            <li>
                                <a href="{{route("info")}}">
                                    <i class="fa fa-user"></i>
                                    Infomation</a>
                            </li>
                            <li class="active">
                                <a href="{{route("messages")}}">
                                    <i class="fa fa-comments"></i> Messages </a>
                            </li>
                            <li>
                                <a href="{{route("products")}}">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> Your products </a>
                            </li>
                            <li>
                                <a href="{{route("change_password")}}">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Change password </a>
                            </li>
                            <li>
                                <a href="{{route("change_mail")}}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i> Change email </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col_200">
                        <ul>
                        </ul>
                    </div>


                </div>
                <div class="col-md-10" id="halink-right" style="padding-left: 5px;padding-right: 5px;">
                    <input type="hidden" value="" id="crp">
                    <div class="main-tit">
                        <h2>Messages</h2>
                        <span>
                            <label for="name" class="ten">Butget:</label>0đ</span>

                    </div>
                    <ul class="nav nav-tabs" style="margin-left: 0px;" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="tab" href="#chat">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#detail">Detail</a>
                        </li>
                    </ul>
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="chat" class="tab-pane active"><br>
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td><input class="form-control" type="text"></td>
                                                <td style="width:30px;" class="hidden-xs">
                                                    <button type="submit" class=" btn btn-danger">Send</button>
                                                </td>
                                            </tr>
                                            @foreach($messages as $message)
                                                <tr>
                                                    <td colspan="2">
                                                        <strong>{{$message->users->name}}</strong>
                                                        {{': '.$message->content}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="detail" class="tab-pane"><br>
                                        {{$product->title}}
                                    </div>
                                </div>

                                <div class="paging"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


    </div>
    </div>



    <div id="back-top" style="cursor:pointer;" title="Lên Đầu Trang."><a class="border_radius"><img src="img/top.png"
                                                                                                    alt="backtop"/></a>
    </div>

    <!-- My custom js -->
    <script type="text/javascript" src="js/thanhtam.js"></script>

@endsection

@section('scripts')
    <script>
        //

    </script>
@endsection
