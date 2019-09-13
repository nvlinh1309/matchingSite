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
                                <a href="{{route("home")}}">
                                    <i class="fa fa-home"></i>
                                    Home</a>
                            </li>

                            @foreach($categories as $category)
                                <li>
                                    <a href="#">
                                        <i class="{{$category->icon}}"></i> {{$category->name}} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col_200">
                        <ul>
                        </ul>
                    </div>


                </div>
                <div class="col-md-10" id="halink-right" style="padding-left: 5px;padding-right: 5px;">

                    <div class="quangcao_top">
                    </div>

                    <div class="row" style="margin-right: -5px;margin-left: -5px;">
                        <div class="col-md-12" style="padding-left: 5px;padding-right: 5px;">
                            <div class="vip width_common box_category box_home">

                                <div class="title_boxhome width_common">
                                    <a href="">
                                        <i class="fa fa-coffee" aria-hidden="true"></i>
                                        <a href="/tin-moi" title="Tin Mới Đăng">{{$product->title}}</a>
                                    </a>
                                </div>

                                <div class="content_boxhome">

                                    <div class="content">
                                        <div class="ctn_detail_box">
                                            <div class="col-sm-4">
                                                <img src="images/products/meo.jpg" width="100%" height="100%">
                                            </div>
                                            <div class="col-sm-8">
                                                <h3 class="title_product_detail">{{$product->title}}</h3>
                                                <p><i class="fa fa-clock-o"></i> {{$product->created_at}} <a
                                                        style="padding-left: 15px" href="#"><i
                                                            class="fa fa-map-marker"></i> Ho Chi Minh City</a></p>
                                                <label class="price_lb">
                                                    {{number_format($product->price,0)}} $
                                                </label>
                                                <div>{{$product->descripton}}</div>


                                            </div>
                                            <div class="col-sm-12">
                                                <hr>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="main" class="penci-main-sticky-sidebar"
                                                     style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                                    <div class="theiaStickySidebar"
                                                         style="padding-top: 0px; padding-bottom: 1px; position: static;">
                                                        <article id="post-4124"
                                                                 class="post type-post status-publish hentry">
                                                            <div class="post-entry blockquote-style-2">
                                                                <div class="inner-post-entry entry-content"
                                                                     id="penci-post-entry-inner">
                                                                    {{$product->content}}
                                                                    <div>
                                                                        <p class="title_boxhome width_common"
                                                                           style="color: red">
                                                                            <i class="fa fa-pencil-square-o"></i>
                                                                            Related products
                                                                        </p>
                                                                        @foreach($products as $prod)
                                                                            <a href="{{route('detail',['id'=>$prod->id])}}">
                                                                                <strong>{{$prod->title}}</strong>
                                                                            </a>
                                                                            <hr style="margin-top: 0px">
                                                                        @endforeach

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </article>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="left_blog">
                                                    <h2><i class="fa fa fa-comments" aria-hidden="true"></i>Contact</h2>
                                                    <div class="blog_list">
                                                        @if($errors->has('sendSuccess'))
                                                            <div
                                                                class="alert-success">{{$errors->first('sendSuccess')}}</div>
                                                        @endif
                                                        @if(Auth::check())
                                                            @if($product->user_id==Auth::user()->id)
                                                                It's your own product, you can't contact the publisher.
                                                            @else
                                                                @if($message>0)
                                                                        You have sent contact for this product. Please check the
                                                                        <a href="{{route('messages')}}">message management</a>.
                                                                @else
                                                                    <form method="POST"
                                                                          action="{{route('send_contact',['id'=> $product->id])}}">
                                                                        @csrf
                                                                        <input type="hidden" name="id_to"
                                                                               value="{{$product->user_id}}">
                                                                        <input type="hidden" name="user_type"
                                                                               value="{{$product->user_type}}">

                                                                        <div class="form-group">
                                                                            <label>Your name</label>
                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   name="name"
                                                                                   placeholder="Enter name"
                                                                                   value="{{Auth::user()->name}}">
                                                                        </div>
                                                                        @if($errors->has('name'))
                                                                            <i style="color:red">{{$errors->first('name')}}</i>
                                                                        @endif
                                                                        <div class="form-group">
                                                                            <label>Your e-mail address</label>
                                                                            <input type="email"
                                                                                   class="form-control"
                                                                                   name="email"
                                                                                   id="email"
                                                                                   placeholder="Enter email"
                                                                                   value="{{Auth::user()->email}}"
                                                                            >
                                                                        </div>
                                                                        @if($errors->has('email'))
                                                                            <i style="color:red">{{$errors->first('email')}}</i>
                                                                        @endif
                                                                        <div class="form-group">
                                                                            <label>Phone number</label>
                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   name="phone"
                                                                                   value="{{old('phone')}}"
                                                                                   placeholder="Enter phone number">
                                                                        </div>
                                                                        @if($errors->has('phone'))
                                                                            <i style="color:red">{{$errors->first('phone')}}</i>
                                                                        @endif
                                                                        <div class="form-group">
                                                                            <label>Message</label>
                                                                            <textarea class="form-control" rows="5"
                                                                                      placeholder="Enter content"
                                                                                      name="content"
                                                                            >{{old('content')}}</textarea>
                                                                        </div>
                                                                        @if($errors->has('content'))
                                                                            <i style="color:red">{{$errors->first('content')}}</i>
                                                                        @endif
                                                                        <button
                                                                            style="border-color: #ed1c24;background: #ed1c24 none repeat scroll 0 0; color: #fff;"
                                                                            class="btn btn-default" type="submit">Send
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        @else
                                                            You must log in or register a new account in order to
                                                            contact the advertiser
                                                            <p>
                                                                <a href="{{route('login')}}">Login</a> | <a
                                                                    href="{{route('register')}}">Register for a free
                                                                    account</a>
                                                            </p>
                                                        @endif


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="clear"></div>
                                </div>

                            </div>
                            <div class="clear"></div>

                        </div>
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
