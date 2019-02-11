<div class="popup popup-regis">
    <div class="popup-content pa">
        <a href="javascript:void(0)" class="close-popup pa" title="Đóng lại">X</a>
        <div class="content">
            <div class="title">
                <strong>Tạo tài khoản</strong>
                Bạn hãy tạo tài khoản mà bạn muốn
            </div>
            <form id="register_form" action="{{ url('saveRegister') }}" method="POST">
                <div class="rows">
                    <label>Tên đăng nhập <orange>*</orange></label>
                    <input name="login" type="text" placeholder="Tên đăng nhập">
                    {{ csrf_field() }}
                </div>
                <div class="rows">
                    <label>Email <orange>*</orange></label>
                    <input name="email" type="text" placeholder="Email">
                </div>
                <div class="rows">
                    <label>Số điện thoại <orange>*</orange></label>
                    <input name="phone" type="text" placeholder="Số điện thoại">
                </div>
                <div class="rows">
                    <label>Mật khẩu <orange>*</orange></label>
                    <input name="password" type="text" placeholder="Mật khẩu">
                    <input type="checkbox" checked=""> Hiển thị mật khẩu
                </div>
                <div class="rows">
                    <label>Họ tên <orange>*</orange></label>
                    <input name="name" type="text" placeholder="Họ và tên">
                </div>
                <div class="rows">
                    <label>Tỉnh/ Thành phố sinh sống <orange>*</orange></label>
                    <input name="province" type="text" placeholder="Tỉnh/ Thành phố">
                </div>
                <div class="rows">
                    <label>Ngày/tháng/năm sinh <orange>*</orange></label>
                    <input name="dob" type="text" placeholder="DD/MM/YYYY">
                </div>
                <div class="rows">
                    <label>CMND/ Căn cước công dân/ Hộ chiếu <orange>*</orange></label>
                    <input name="ssn" type="text" placeholder="CMDN/ Căn cước công dân/ Hộ chiếu">
                </div>
                <div class="rows theLast">
                    <label>Địa chỉ cụ thể <orange>*</orange></label>
                    <textarea name="address" id="" cols="30" rows="4" placeholder="Địa chỉ cụ thể"></textarea>
                </div>
                <div class="note">
                    Khi bạn nhấn nút "Tạo tài khoản" dưới đây thì có nghĩa là bạn đã đồng ý với các <br>
                    <a href="{{ url('dieu-khoan') }}" title="Điều khoản quy định" target="_blank">Điều khoản quy định</a>
                    của estrogen.vn
                </div>
                <a href="javascript:void(0)" id="click_register" class="btn-create" title="Tạo tài khoản">Tạo tài khoản</a>
                <div class="txt">Vui lòng xác nhận qua email</div>
                <div id="errors" class="errors">Vui lòng nhập đầy đủ các thông tin trên</div>
            </form>
        </div>
    </div>
</div>


<div class="popup popup-login px">
    <div class="popup-content pa">
        <a href="javascript:void(0)" class="close-popup pa" title="Đóng lại">X</a>
        <div class="content">
            <div class="title">
                <strong>Đăng nhập</strong>
                Chào bạn ! Hãy đăng nhập để gửi bài viết
            </div>
            <form action="">
                <div class="rows">
                    <label>Tên đăng nhập</label>
                    <input type="text" placeholder="Tên đăng nhập">
                </div>
                <div class="rows">
                    <label>Mật khẩu</label>
                    <input type="text" placeholder="Mật khẩu">
                    <input type="checkbox" checked=""> Ghi nhớ
                </div>
                <a href="{{ url('/') }}" class="btn-loginF" title="Tạo tài khoản">Đăng nhập</a>
                <div class="rows">
                    <a href="javascript:void(0)" class="forgot-pass" title="Quên mật khẩu">Quên mật khẩu</a>
                </div>
                <div class="errors">Vui lòng nhập đầy đủ các thông tin trên</div>
            </form>
        </div>
    </div>
</div>

<div class="popup popup-successful">
    <div class="popup-content pa">
        <a href="javascript:void(0)" class="close-popup pa" title="Đóng lại">X</a>
        <div class="content">
            <div class="title">
                <strong> Đặt hàng thành công</strong>
                Chúng tôi sẽ liên hệ lại với bạn để xác nhận đơn hàng. Cảm ơn bạn.
            </div>

        </div>
    </div>
</div>