<div id="footer">
    <div class="center w-clear">
        <div id="menufoot">
            <div id="linkfoot">
                <ul id="foot-menu">
                    <li id="menu-mobile" style="color: #fff" class="menu-mobile">
                        <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"
                             width="20" height="20" focusable="false"><title>Menu</title>
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                        </svg>
                        <div style="margin-left: 5px; display: inline-block;">Menu</div>
                    </li>
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>

                    <div class="clear"></div>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div id="footer_noidung">
            <div class="footk">
                <p style="text-align: center;margin:5px;"><span
                        style="font-family:helvetica,sans-serif; font-size:14px">Copyright &copy; 2019 - MatchingSite</span><br/>
                </p>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <script>
        $('#menu-mobile').click(function () {
            let menu = $('#foot-menu');
            if (menu.hasClass('active'))
                menu.removeClass('active');
            else
                menu.addClass('active');
        });
    </script>
</div>
