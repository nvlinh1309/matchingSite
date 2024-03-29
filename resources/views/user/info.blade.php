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
                            <li class="active">
                                <a href="{{route("info")}}">
                                    <i class="fa fa-user"></i>
                                    Infomation</a>
                            </li>
                            <li>
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
                    <form action="{{route('changeInfo')}}" method="post" class="w-tttk">
                        @csrf
                        <div class="main-tit"><h2>Infomation</h2><span><label for="name" class="ten">Butget:</label>
			0đ</span></div>
                        <div style="color:#F00;font-weight:bold;">
                        </div>
                        @if (Session::has('success'))
                            <div style="color: green">{{ Session::get('success') }}</div>
                        @endif
                        <div class="w-clear">
                            <div class="dk-l">
                                Your name
                            </div>
                            <div class="dk-r">
                                <input type="text" name="name" class="input" value="{{Auth::user()->name}}">
                            </div>
                            <div class="dk-a">
                                @if($errors->has('name'))
                                    {{$errors->first('name')}}
                                @endif
                            </div>
                        </div>
                        <div class="w-clear">
                            <div class="dk-l">
                                Address
                            </div>
                            <div class="dk-r">
                                <input type="text" name="address" class="input" value="{{Auth::user()->address}}">
                            </div>
                            <div class="dk-a">
                                @if($errors->has('address'))
                                    {{$errors->first('address')}}
                                @endif
                            </div>
                        </div>
                        <div class="w-clear">
                            <div class="dk-l">
                                Phone
                            </div>
                            <div class="dk-r">
                                <input type="text" name="phone" class="input" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="dk-a">
                                @if($errors->has('phone'))
                                    {{$errors->first('phone')}}
                                @endif
                            </div>
                        </div>
                        <div class="w-clear">
                            <div class="dk-l dn-vh">

                            </div>
                            <div class="dk-r">
                                <input type="submit" class="button" value="Update">
                                <input type="reset" class="button" value="Reset">
                            </div>
                        </div>
                    </form>
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
