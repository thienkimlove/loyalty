<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title class="title-site" lp-id="5c570e899c764268f58e02ca">Chương trình khách hàng thân thiết Hona Beauty
        VIP</title>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="description"
          content="Chương trình tri ân và gắn kết khách hàng khi mua các sản phẩm thuộc hệ thống Hona Beauty">
    <meta name="keywords" content="hanatural, hoa xuân, white+">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>function ladiViewport() {
            var width = (window.outerWidth > 0) ? window.outerWidth : screen.width;
            var content = "user-scalable=no";
            if (width < 768) {
                content += ", width=375";
            } else {
                if (width < 960) {
                    content += ", width=960";
                } else {
                    content += ", width=device-width";
                }
            }
            var meta = document.querySelector('meta[name="viewport"]');
            if (meta == undefined) {
                meta = document.createElement('meta');
                meta.name = 'viewport';
                document.head.prepend(meta);
            }
            meta.content = content;
        };ladiViewport();</script>
    <meta property="og:title" content="Chương trình khách hàng thân thiết Hona Beauty VIP"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://demo.pagedemo.me/5c570e899c764268f58e02ca"/>
    <meta property="og:image" content="https://static.ladipage.net/5c287a86b0bb7c271ce70c23/1-1549209902.jpg">
    <meta property="og:description"
          content="Chương trình tri ân và gắn kết khách hàng khi mua các sản phẩm thuộc hệ thống Hona Beauty"/>
    <meta name="format-detection" content="telephone=no"/>
    <link rel="shortcut icon" type="image/png" href="{{url('frontend/images/icon.gif')}}"/>
    <link rel="dns-prefetch">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link rel="preconnect" href="https://static.ladipage.net/" crossorigin>
    <link rel="preconnect" href="https://api.ladipage.vn/" crossorigin>
    <link type="text/css" rel="stylesheet" media="screen, print"
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Arima+Madurai:300,400,700|Cormorant+Upright:400,600,700|Montserrat:300,400,600,700|Roboto:300,400,700|Roboto+Slab:300,400,700|Baloo+Bhaina&amp;subset=latin-ext,vietnamese">

    <link type="text/css" rel="stylesheet" media="all" href="{{url('frontend/css/style.css')}}" />

    <script type="text/javascript" src="{{url('frontend/js/common.js')}}"></script>

</head>
<body>
<div class="ladi-wraper-page"
     lp-tk="{&quot;idgAny&quot;:&quot;false&quot;,&quot;pixel&quot;:&quot;false&quot;,&quot;idgAds&quot;:&quot;false&quot;}">

    @if(!$is_login)

        @include('frontend.partials.not_login_top')

    @endif

    @include('frontend.popup.login')

    @if ($is_login)
        @include('frontend.partials.login_top')
    @endif

    @include('frontend.popup.add_card')

    @include('frontend.partials.introduction')


    @include('frontend.partials.exchange_product')
    @include('frontend.popup.exchange')
    @include('frontend.partials.selling_product')
    @include('frontend.partials.footer')
</div>

<script type="text/javascript">

    $(document).ready(function(){


        $('#BUTTON969').click(function(){
            let elForm = $('form#add_card');
            let phone = elForm.find('input[name=phone]').val().replace(/ /g,'');
            let code = elForm.find('input[name=code]').val().replace(/ /g,'');
            let recommend = elForm.find('input[name=recommend]').val().replace(/ /g,'');
            let regex_phone = /^\d{10,11}$/gm;
            let regex_code = /^\w{9}$/gm;
            let validation = true;

            let debug = null;

            if (!phone || !code) {
                debug = 'No code or phone!';
                validation = false;
            }

            if (phone && !regex_phone.test(phone)) {
                debug = 'Phone format is wrong!';
                validation = false;
            }

            if (recommend && !regex_phone.test(recommend)) {
                debug = 'Recommend Phone is wrong!';
                validation = false;
            }

            if (code && !regex_code.test(code)) {
                debug = 'Code format is wrong!';
                validation = false;
            }


            if (validation === false) {
                alert(debug);
            } else {
                elForm.submit();
            }
            return false;
        });

        $('#BUTTON766').click(function(){
            let elForm = $('form#add_card_form');
            let phone = elForm.find('input[name=phone]').val().replace(/ /g,'');
            let code = elForm.find('input[name=code]').val().replace(/ /g,'');
            let recommend = elForm.find('input[name=recommend]').val().replace(/ /g,'');
            let regex_phone = /^\d{10,11}$/gm;
            let regex_code = /^\w{9}$/gm;
            let validation = true;

            if (!phone || !code) {
                validation = false;
            }

            if (phone && !regex_phone.test(phone)) {
                validation = false;
            }

            if (recommend && !regex_phone.test(recommend)) {
                validation = false;
            }

            if (code && !regex_code.test(code)) {
                validation = false;
            }


            if (validation === false) {
              $('#HEADLINE912Q').hide();
              $('#HEADLINE912A').show();
              return false;
            } else {
                $('#HEADLINE912A').hide();
                $('#HEADLINE912Q').show();
            }
            elForm.submit();
            return false;
        });


        $('#BUTTON976').click(function(){
            let elForm = $('form#login_form');
            let phone = elForm.find('input[name=phone]').val().replace(/ /g,'');
            let code = elForm.find('input[name=code]').val().replace(/ /g,'');

            let regex_phone = /^\d{10,11}$/gm;
            let regex_code = /^\w{9}$/gm;
            let validation = true;

            if (!phone || !code) {
                validation = false;
            }

            if (phone && !regex_phone.test(phone)) {
                validation = false;
            }


            if (code && !regex_code.test(code)) {
                validation = false;
            }


            if (validation === true) {
                elForm.submit();
            } else {
                alert('Error!');
            }
            return false;
        });
    });

</script>

</body>
</html>