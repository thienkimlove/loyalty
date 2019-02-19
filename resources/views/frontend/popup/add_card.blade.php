<div id="POPUP961" class="widget-section ladi-drop ui-droppable" lp-type="widget_section" lp-widget="widget"
     lp-lang="SECTION" lp-popup="true" lp-delay-show-popup-page="1" lp-display="block" lp-action-link="POPUP961"
     lp-action-type="popup" lp-target="" href="" style="display: none;">
    <div class="container">
        <div class="overlay-container-popup"></div>
        <div id="BOX962" class="widget-element widget-snap ladi-drop" lp-type="box" lp-lang="BOX"
             lp-display="block">
            <div class="widget-content">
                <div id="HEADLINE963" class="widget-element widget-snap" lp-type="textinline" lp-editor="true"
                     lp-lang="HEADLINE" lp-display="block"><h3 class="widget-content" lp-node="h3">TÍCH ĐIỂM<br>
                    </h3></div>
            </div>
            <div class="ladi-widget-overlay"></div>
        </div>
        <div id="PARAGRAPH964" class="widget-element widget-snap" lp-type="textparagraph" lp-editor="true"
             lp-lang="PARAGRAPH" lp-display="block"><h6 class="widget-content" lp-node="h6">- Với mỗi thẻ VIP, bạn
                có thểm 100 điểm và 100 vàng trong tài khoản.&nbsp;<br>- Giới thiệu thêm 1 người mua hàng, cả người giới
                thiệu và người được giới thiệu được thêm 100 vàng trong tài khoản.</h6></div>
        <div id="FORM965" class="widget-element widget-snap" lp-display="block">
            <form id="add_card" class="widget-content" method="post" action="{{ route('frontend.add_card') }}">
                {{csrf_field()}}
                <div id="ITEM_FORM966" class="widget-element widget-snap widget-dragg widget-item-child">
                    <input class="widget-content"
                           type="text"
                           placeholder="Nhập số điện thoại của bạn"
                           value="{{ ($is_login)? $member['phone']: "" }}"
                           readonly="{{ ($is_login)? 'true':'false' }}"
                           name="phone"
                           required="required">
                </div>
                <div id="ITEM_FORM967" class="widget-element widget-snap widget-dragg widget-item-child">
                    <input class="widget-content"
                           type="text"
                           placeholder="Nhập mã thẻ VIP"
                           name="code"
                           required="required">
                </div>
                <div id="ITEM_FORM968" class="widget-element widget-snap widget-dragg widget-item-child">
                    <input class="widget-content"
                           type="text"
                           placeholder="Nhập số điện thoại người giới thiệu"
                           name="recommend">
                </div>
            </form>
        </div>
        <div id="BUTTON969" class="widget-element widget-snap style-1" lp-type="button" lp-lang="BUTTON"
             lp-background="button" lp-parent="FORM965" lp-display="table"><span
                    class="widget-content">TÍCH ĐIỂM</span></div>
    </div>
    <div class="ladi-widget-overlay"></div>
</div>