<div id="POPUP970"
     class="widget-section ladi-drop ui-droppable"
     lp-type="widget_section"
     lp-widget="widget"
     lp-lang="SECTION"
     lp-popup="true"
     lp-delay-show-popup-page="1"
     lp-display="block"
     style="display: none;">
    <div class="container">
        <div class="overlay-container-popup"></div>
        <div id="BOX971"
             class="widget-element widget-snap ladi-drop"
             lp-type="box"
             lp-lang="BOX"
             lp-display="block">
            <div class="widget-content">
                <div id="HEADLINE972"
                     class="widget-element widget-snap"
                     lp-type="textinline"
                     lp-editor="true"
                     lp-lang="HEADLINE"
                     lp-display="block">
                    <h3 class="widget-content" lp-node="h3">ĐĂNG NHẬP</h3>
                </div>
            </div>
            <div class="ladi-widget-overlay"></div>
        </div>
        <div id="PARAGRAPH975" class="widget-element widget-snap"
             lp-type="textparagraph"
             lp-editor="true"
             lp-lang="PARAGRAPH"
             lp-display="block">
            <h6 class="widget-content" lp-node="h6">Vui lòng liên hệ fanpage chính thức của chúng tôi để được giải </h6>
        </div>
        <div id="FORM973" class="widget-element widget-snap" lp-display="block">
            <form id="login_form" class="widget-content" method="post" action="{{ route('frontend.login') }}">
                {{csrf_field()}}
                <div id="ITEM_FORM977"
                     class="widget-element widget-snap widget-dragg widget-item-child"
                     lp-type="item_form"
                     lp-lang="ITEM_FORM"
                     lp-display="block">
                    <input class="widget-content"
                           type="tel"
                           pattern="[0-9]{9,15}"
                           required="required"
                           placeholder="Nhập Số điện thoại của bạn"
                           name="phone"
                           lp-label="Điện thoại"
                           lp-name-id="phone">
                </div>
                <div id="ITEM_FORM978"
                     class="widget-element widget-snap widget-dragg widget-item-child"
                     lp-type="item_form"
                     lp-lang="ITEM_FORM"
                     lp-display="block">
                    <input class="widget-content"
                           type="text"
                           placeholder="Nhập mã thẻ bất kỳ mà bạn có"
                           name="code"
                           lp-label="Ô nhập tùy chọn 1"
                           lp-name-id="lpinput1"
                           required="required">
                </div>
            </form>
        </div>
        <div id="BUTTON976" class="widget-element widget-snap style-1"
             lp-type="button"
             lp-lang="BUTTON"
             lp-background="button"
             lp-parent="FORM973"
             lp-display="table">
            <span class="widget-content">ĐĂNG NHẬP</span>
        </div>
        <a id="BUTTON980"
           class="widget-element widget-snap style-1"
           lp-type="button"
           lp-lang="BUTTON"
           lp-background="button"
           lp-display="table"
           lp-action-link="https://m.me/bikiptangsizenguc"
           lp-action-type="url"
           lp-target="_blank"
           href="https://m.me/bikiptangsizenguc"
           target="_blank">
            <span class="widget-content"> XIN LẠI MÃ THẺ</span>
        </a>
    </div>
    <div class="ladi-widget-overlay"></div>
</div>