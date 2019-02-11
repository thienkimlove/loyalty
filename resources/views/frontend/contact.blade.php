@extends('frontend.layout')
@section('content')
    <section class="body pr">
        <div class="fixCen">
            <!--  start block-1 -->
            <div class="block block-banner">
                <img src="{{url('frontend/images/banner-lienhe.jpg')}}" alt="">
            </div>

            <!--  start block-2 -->
            <div class="block-5 padding-bottom-200">
                <div class="block-title text-center">
                    <h2>LIÊN HỆ</h2>
                </div>
                <div class="block-info">
                    Vui lòng gọi điện đến tổng đài tư vấn miễn cước 1800 1258 để được các Dược sĩ nhiều năm kinh nghiệm tư vấn trực tiếp.<br/>
                    Hoặc gửi câu hỏi cho PGS.TS Bác sỹ Nguyễn Văn Mùi để được chuyên gia trả lời các thắc mắc của bạn.<br/>
                    Việc đọc trước những câu hỏi thường gặp sẽ tiết kiệm thời gian cho bạn<br/>
                    Hoặc gửi câu hỏi cho PGS.TS Bác sỹ Nguyễn Văn Mùi để được chuyên gia trả lời các thắc mắc của bạn.<br/>
                    Việc đọc trước những câu hỏi thường gặp sẽ tiết kiệm thời gian cho bạn
                </div>

                {!! Form::open(array('url' => 'saveContact', 'id' => 'contact')) !!}
                    <div class="form-row">
                        <label for="name">Họ và tên</label>
                        <input type="text" id="contact_name" name="name" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-row">
                        <label for="phone">Điện thoại</label>
                        <input type="tel" id="contact_phone" name="phone" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-row">
                        <label for="email">Email</label>
                        <input type="email" id="contact_email" name="email" placeholder="Nhập email" required>
                    </div>
                    <div class="form-row">
                        <label for="title">Tiêu đề</label>
                        <input type="text" id="contact_title" name="title" placeholder="Nhập tiêu đề" required>
                    </div>
                    <div class="form-row">
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="contact_content" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                    </div>
                    <div id="contact_errors" class="errors" style="display: none">Điền đầy đủ các thông tin</div>
                    <div class="contain-btn form-row">
                        <button id="contact_submit" type="button">Gửi</button>
                        <button id="contact_reset" type="reset">Nhập lại</button>
                    </div>
                {!! Form::close() !!}

                <div class="block-info">
                    Cơ quan chủ quản: Công ty TNHH Truyền thông Sức khỏe là Vàng<br/>
                    Trụ sở chính: Thôn 3, xã Phù Lưu Tế, Huyện Mỹ Đức, thành phố Hà Nội.<br/>
                    * Các thông tin trên website dùng để tham khảo, khi áp dụng nên hỏi ý kiến Bác sĩ chuyên khoa.<br/>
                    * Chúng tôi không chịu bất cứ trách nhiệm nào do việc tự ý áp dụng các thông tin trên website gây ra.<br/>
                    * Email: phongbenhgan.fb@gmail.com<br/>
                    * Số điện thoại: 0243.9901436 <br/>
                    * Chịu trách nhiệm nội dung: Bà Đàm Thị Xuyến <br/>
                    * GP MXH: 253/GP-BTTTT do Bộ TTTH cấp ngày 28 tháng 6 năm 2018<br/>
                    * Website đang trong quá trình thử nghiệm và hoàn thiện hệ thống kỹ thuật<br/>
                    * Điều khoản sử dụng.
                </div>

            </div>

        </div>

    </section>
@endsection