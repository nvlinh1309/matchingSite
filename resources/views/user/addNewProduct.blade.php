@extends('user.layouts.master')

@section('styles')
    {{--styles--}}
    <style>
        .file_drag_area
        {
            width:600px;
            height:400px;
            border:2px dashed #ccc;
            line-height:400px;
            text-align:center;
            font-size:24px;
        }
        .file_drag_over{
            color:#000;
            border-color:#000;
        }
    </style>

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
                            <li>
                                <a href="{{route("messages")}}">
                                    <i class="fa fa-comments"></i> Messages </a>
                            </li>
                            <li class="active">
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
                        <div class="main-tit"><h2>Add new products</h2><span><label for="name" class="ten">Butget:</label>
			0$</span></div>
                    <form method="POST" action="">
                        <div class="col-sm-6">
                            <div class="w-clear">
                                <div class="dk-l">Title</div>
                                <div class="dk-r">
                                    <input type="text" name="title" class="input" >
                                </div>
                                <div class="dk-a">
                                </div>
                            </div>
                            <div class="w-clear">
                                <div class="dk-l">Price</div>
                                <div class="dk-r">
                                    <input type="text" name="price" class="input">
                                </div>
                                <div class="dk-a">
                                </div>
                            </div>
                            <div class="w-clear">
                                <div class="dk-l">Currency</div>
                                <div class="dk-r">
                                    <select style="height: 28px;" class="input" name="currency">
                                        @foreach($currencies as $currency)
                                            <option name="{{$currency->id}}">{{$currency->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="dk-a">
                                </div>
                            </div>
                            <div class="w-clear">
                                <div class="dk-l">Description</div>
                                <div class="dk-r">
                                    <textarea class="input" name="description"></textarea>
                                </div>
                                <div class="dk-a">
                                </div>
                            </div>
                            <div class="w-clear">
                                <div class="dk-l">Content</div>
                                <div class="dk-r">
                                    <textarea class="input" rows="8" name="content"></textarea>
                                </div>
                                <div class="dk-a">
                                </div>
                            </div>
                            <div class="w-clear">
                                <div class="dk-l">Type</div>
                                <div class="dk-r">
                                    <select style="height: 28px;" class="input" name="category">
                                        @foreach($categories as $category)
                                            <option name="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="dk-a">
                                </div>
                            </div>

                            <div class="w-clear">
                                <div class="dk-l dn-vh">
                                </div>
                                <div class="dk-r">
                                    <input type="submit" class="button" value="Add">
                                    <input type="reset" class="button" value="Reset">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="file_drag_area">
                                    Drop Files Here
                                </div>
                                <style>
                                    .file_drag_area{
                                        margin: 73px 171px;
                                        border-style: solid;
                                        border: 1px;
                                    }
                                    }
                                </style>
                                <div id="uploaded_file"></div>
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
        $(document).ready(function(){
            $('.file_drag_area').on('dragover', function(){
                $(this).addClass('file_drag_over');
                return false;
            });
            $('.file_drag_area').on('dragleave', function(){
                $(this).removeClass('file_drag_over');
                return false;
            });
            $('.file_drag_area').on('drop', function(e){
                e.preventDefault();
                $(this).removeClass('file_drag_over');
                var formData = new FormData();
                var files_list = e.originalEvent.dataTransfer.files;
                //console.log(files_list);
                for(var i=0; i<files_list.length; i++)
                {
                    formData.append('file[]', files_list[i]);
                }
                //console.log(formData);
                $.ajax({
                    url:"upload.php",
                    method:"POST",
                    data:formData,
                    contentType:false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        $('#uploaded_file').html(data);
                    }
                })
            });
        });
    </script>
@endsection
