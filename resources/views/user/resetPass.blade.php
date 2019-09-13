@extends('user.layouts.master')

@section('styles')
    {{--styles--}}
@endsection

@section('content')


    <div id="smenu">
        <img src="img/menu.png" alt="Menu" class="i-menu" />
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
            <div id="col_920" class="col_920_right">
                <div class="form-container" data-reactid="42">
                    <!-- react-empty: 43 -->
                    <div class="form-title col-lg-12 col-md-12 col-xs-12">RESET PASSWORD</div>
                    @if($errors->has('errorlogin'))

                        <div class="errorMessage">{{$errors->first('errorlogin')}}</div>


                    @endif
                    <form action="{{route('post_Reset_pass',['id'=>$user->id, 'token'=>$token])}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id"  value="{{$user->id}}">
                        <input type="hidden" name="token" id="token"  value="{{$token}}">
                        <input type="password" class="form-control" name="password" id="password"  value="{{old('password')}}" placeholder="Enter your password">
                        @if($errors->has('password'))
                            <i style="color:red">{{$errors->first('password')}}</i>
                        @endif
                        <input type="password" class="form-control" name="re_password" id="re_password"  value="{{old('re_password')}}" placeholder="Confirm your password">
                        @if($errors->has('re_password'))
                            <i style="color:red">{{$errors->first('re_password')}}</i>
                        @endif
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-xs-12" style="padding: 0px">
                                <button type="submit" class="btn btn-login" id="btn-login" style="">UPDATE</button>
                            </div>
                        </div>
                    </form>
                    <!-- react-empty: 64 -->
                </div>
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
