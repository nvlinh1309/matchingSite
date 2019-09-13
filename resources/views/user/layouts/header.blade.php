<?php
use App\Category;
$categories = Category::where('status',1)->orderBy('position', 'ASC')->get();
?>
<div id="banner" style="">
    <div id="myvne_taskbar_raovat" class="center">
        <div class="myvne_container">

            <a href="{{route("home")}}" class="logo_vne">
                <img title="Matching site" src="{{asset("images/logo.png")}}"
                     alt="raovat321 - rao vat mien phi" class="logo"/>
            </a>
            <div class="txt_dangtin right1" style="margin-top: 6px; padding: 0px 10px;">
                <a href="{{Auth::check()?route("add_new_product"):route("login")}}" class="myvne_submit"
                   onclick="{{Auth::check()?'':"alert('Bạn chưa đăng nhập, hãy đăng nhập để đăng tin.');"}}">Publish your ad for free</a>
            </div>
            <ul class="myvne_form_log right1 hidden-xs">
                <li class="myvne_user">
                    @php
                        if (Auth::check()) {
                            echo '<a href="'.route("info").'">'.Auth::user()->name.'</a> | <a href="'.route('getLogout').'">Logout</a>';
                        }else{
                            echo '<a href="'.route("login").'">
                                    <i class="fa fa-lock"></i>Login
                                </a>
                                |
                                <a href="'.route("register").'">
                                    Register
                                </a>';
                                    }
                    @endphp

                </li>
            </ul>

            <ul class="myvne_form_log right1 hidden-xs">
                <li class="myvne_user">




                        <select name="options">
                            <option class="en" value="en"
                                    style="background-image:url('images/languages/en.png');">EN
                            </option>
                            <option class="jp" value="jp"
                                    style="background-image:url('images/languages/jp.png');">JP
                            </option>
                        </select>

                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>


    <script>
        $('#halink-menu').on('click', function () {
            $('.dropdown-menu').toggle();
        });
        $('#select-province').on('change', function () {
            var idc = $('#select-province').val();
            console.log(idc);

            if (idc == 0) {

            }
        });
    </script>
</div>
<div style="    /* padding: 0 15px; */
    max-width: 1140px;
    margin: 0 auto;
    /* max-width: 980px; */
    max-width: 1140px;
    position: relative;
    text-align: center; padding-top:15px;  padding-bottom:10px;">

    <div id="search-dm">
        <div class="row" style="">
            <form action="/tim-kiem">

                <div class="col-md-5 halink-layout">
                    <input class="form-control halink-form no-border" id="keywords" value=""
                           placeholder="Search..." name="keyword" id="srch-term" type="text"
                           onkeypress="doEnters(event)">
                    <i class="form-control-search fa fa-search hidden-xs"></i>
                </div>

                <div class="col-md-3 halink-layout">
                    <i id="mbn-top-search-city-icon" class="fa fa-map-marker hidden-xs"></i>
                    <select name="" class="form-control halink-form no-border" id="idc">
                        <option value="0"> Location</option>
                    </select>
                </div>
                <div class="col-md-4 halink-layout">

                    <div class="input-group add-on">
                        <i class="fa fa-th-large hidden-xs" id="idl-icon"></i>
                        <select name="" id="idl" class="form-control halink-form no-border">
                            <option value=""> All</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                        <div class="input-group-btn">
                            <button
                                style="border-color: #ed1c24;background: #ed1c24 none repeat scroll 0 0; color: #fff;"
                                class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search
                            </button>

                        </div>


                    </div>

                </div>
            </form>

        </div>

    </div>
</div>


