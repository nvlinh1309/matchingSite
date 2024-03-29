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
                    <input type="hidden" value="" id="crp">
                    <script type="text/javascript">
                        function change(k) {
                            var base_href = 'index.php?com=chon-tin&act=man&type=tintuc';
                            var level_id = '';
                            for (var i = 0; i <= k; i++) {
                                level_id += '&lv' + i + '=' + document.getElementById('level' + i).value;
                            }
                            window.location.href = base_href + level_id + '';
                        }
                    </script>
                    <script>
                        $(document).ready(function () {
                            $("#chonhet").click(function () {
                                var status = this.checked;
                                $("input[name='chon']").each(function () {
                                    this.checked = status;
                                })
                            });

                            $("#xoahet").click(function () {
                                var listid = "";
                                var a = document.getElementById("crp");
                                $("input[name='chon']").each(function () {
                                    if (this.checked) listid = listid + "," + this.value;
                                })
                                listid = listid.substr(1);	 //alert(listid);
                                if (listid == "") {
                                    alert("Bạn chưa chọn mục nào");
                                    return false;
                                }
                                hoi = confirm("Bạn có chắc chắn muốn xóa?");
                                if (hoi) {
                                    var as = "https://raovat321.com/index.php?com=chon-tin&act=delete&listid=" + listid + a.value;
                                    //alert(as);
                                    document.location.href = as;
                                    return false;
                                }

                            });
                        });
                    </script>
                    <div class="main-tit"><h2>Your products</h2><span><label for="name" class="ten">Butget:</label>
			0$</span></div>
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th class="hidden-xs" style="width: 10px">
                                                <input type="checkbox" name="chonhet" id="chonhet">
                                            </th>

                                            <th style="min-width:150px;" class="hidden-xs">Title</th>
                                            <!-- <th style="width:20%; text-align: center;" class="visible-xs">Tùy chọn</th> -->
                                            <th style="width:30px;" class="hidden-xs">Edit</th>
                                            <th style="width:85px; text-align: center" class="hidden-xs">Status</th>

                                            </th>
                                            <th style="width:30px;" class="hidden-xs">Delete</th>
                                        </tr>
                                        @foreach($products as $product)
                                            <tr>
                                                <td align="center"><input type="checkbox" name="chonhet" id="chonhet">
                                                </td>
                                                <td>{{$product->title}}</td>
                                                <td align="center"><i class="fa fa-edit"
                                                                      style="font-size:24px;color:red"></i></td>
                                                <td align="center"><i class="fa fa-lock"
                                                                      style="font-size:24px;color:red"></i></td>
                                                <td align="center">
                                                    <a href="#{{$product->id}}">
                                                        <i class="fa fa-trash" style="font-size:24px;color:red"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div><!-- /.box -->
                                <div>{{ $products->links() }}</div>
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
