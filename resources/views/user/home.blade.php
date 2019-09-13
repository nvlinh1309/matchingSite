@extends('user.layouts.master')

@section('styles')
    {{--styles--}}
@endsection

@section('content')
    <?php
    use App\Category;
    $categories = Category::where('status', 1)->orderBy('position', 'ASC')->get();
    ?>
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
                @foreach($categories as $category)
                    <li>
                        <a href="">{{$category->name}}</a>
                    </li>
                @endforeach

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
                                    <a href=""><i class="{{$category->icon}}"></i> {{$category->name}}</a>
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
                                        <a href="/tin-moi" title="Tin Mới Đăng">Tin Mới Đăng</a>
                                    </a>
                                </div>

                                <div class="content_boxhome">

                                    @foreach($products as $product)

                                        <div class="row_box">
                                            <div class="thumb">
                                                <a href="{{route('detail',['id'=>$product->id])}}">
                                                    <img style="height: 52px" src="images/products/meo.jpg"/>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <div class="round_titbox">
                                                    <div class="title_new">
                                                        <h3>
                                                            <a href="{{route('detail',['id'=>$product->id])}}">{{$product->title}}</a>
                                                        </h3>
                                                        <div class="price"><a
                                                                href="{{route('detail',['id'=>$product->id])}}">{{number_format($product->price)}} $</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="lacation_gia">
                                                    <ul>
                                                        <li class="left local_sp">
                                                            <i class="fa fa-location-arrow"></i>
                                                            <a>Cần Thơ</a>
                                                        </li>
                                                        <li class="right">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            {{$product->created_at}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    <div>{{$products->links()}}</div>
                                    <div class="qc_giua">
                                    </div>


                                    <div class="phantrang"></div>
                                    <!-- </div> -->

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
