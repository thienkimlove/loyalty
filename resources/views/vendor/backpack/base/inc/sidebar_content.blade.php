<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>

<li><a href='{{ backpack_url('member') }}'><i class='fa fa-address-book'></i> <span>Members</span></a></li>

<li><a href='{{ backpack_url('card') }}'><i class='fa fa-address-card-o'></i> <span>Cards</span></a></li>

<li><a href='{{ backpack_url('add_card') }}'><i class='fa fa-address-card-o'></i> <span>Added Cards</span></a></li>

<li><a href='{{ backpack_url('transaction') }}'><i class='fa fa-address-card-o'></i> <span>Logs</span></a></li>

<li><a href="{{ backpack_url('product') }}"><i class="fa fa-user"></i> <span>Products</span></a></li>

<li><a href="{{ backpack_url('gift') }}"><i class="fa fa-user"></i> <span>Gifts</span></a></li>

<!-- Users, Roles Permissions -->
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
        <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>

<!-- Users, Roles Permissions -->
{{--
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
        --}}
{{--<li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
        <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>--}}{{--

    </ul>
</li>--}}
