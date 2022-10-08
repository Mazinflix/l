<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    <span>
                        {{ trans('global.dashboard') }}
                        
                    </span>
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('customer_access')
                            <li class="{{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.customers.index") }}">
                                    <i class="fa-fw fas fa-male">

                                    </i>
                                    <span>{{ trans('cruds.customer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('product_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-boxes">

                        </i>
                        <span>{{ trans('cruds.product.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('shoe_access')
                            <li class="{{ request()->is("admin/shoes") || request()->is("admin/shoes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.shoes.index") }}">
                                    <i class="fa-fw fas fa-shoe-prints">

                                    </i>
                                    <span>{{ trans('cruds.shoe.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('shoes_option_access')
                            <li class="{{ request()->is("admin/shoes-options") || request()->is("admin/shoes-options/*") ? "active" : "" }}">
                                <a href="{{ route("admin.shoes-options.index") }}">
                                    <i class="fa-fw fas fa-filter">

                                    </i>
                                    <span>{{ trans('cruds.shoesOption.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('perfume_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-bong">

                                    </i>
                                    <span>{{ trans('cruds.perfume.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('perfumee_access')
                                        <li class="{{ request()->is("admin/perfumees") || request()->is("admin/perfumees/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.perfumees.index") }}">
                                                <i class="fa-fw fas fa-prescription-bottle">

                                                </i>
                                                <span>{{ trans('cruds.perfumee.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('slipper_access')
                            <li class="{{ request()->is("admin/slippers") || request()->is("admin/slippers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.slippers.index") }}">
                                    <i class="fa-fw fab fa-slideshare">

                                    </i>
                                    <span>{{ trans('cruds.slipper.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('slipper_option_access')
                            <li class="{{ request()->is("admin/slipper-options") || request()->is("admin/slipper-options/*") ? "active" : "" }}">
                                <a href="{{ route("admin.slipper-options.index") }}">
                                    <i class="fa-fw fas fa-filter">

                                    </i>
                                    <span>{{ trans('cruds.slipperOption.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('wearable_access')
                            <li class="{{ request()->is("admin/wearables") || request()->is("admin/wearables/*") ? "active" : "" }}">
                                <a href="{{ route("admin.wearables.index") }}">
                                    <i class="fa-fw fab fa-shirtsinbulk">

                                    </i>
                                    <span>{{ trans('cruds.wearable.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('wearable_option_access')
                            <li class="{{ request()->is("admin/wearable-options") || request()->is("admin/wearable-options/*") ? "active" : "" }}">
                                <a href="{{ route("admin.wearable-options.index") }}">
                                    <i class="fa-fw fas fa-tshirt">

                                    </i>
                                    <span>{{ trans('cruds.wearableOption.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('wallet_access')
                            <li class="{{ request()->is("admin/wallets") || request()->is("admin/wallets/*") ? "active" : "" }}">
                                <a href="{{ route("admin.wallets.index") }}">
                                    <i class="fa-fw fas fa-wallet">

                                    </i>
                                    <span>{{ trans('cruds.wallet.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('order_access')
                <li class="{{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.orders.index") }}">
                        <i class="fa-fw fab fa-first-order">

                        </i>
                        <span>{{ trans('cruds.order.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('wearable_order_access')
                <li class="{{ request()->is("admin/wearable-orders") || request()->is("admin/wearable-orders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.wearable-orders.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.wearableOrder.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('slipper_order_access')
                <li class="{{ request()->is("admin/slipper-orders") || request()->is("admin/slipper-orders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.slipper-orders.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.slipperOrder.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('perfume_order_access')
                <li class="{{ request()->is("admin/perfume-orders") || request()->is("admin/perfume-orders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.perfume-orders.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.perfumeOrder.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('wallet_order_access')
                <li class="{{ request()->is("admin/wallet-orders") || request()->is("admin/wallet-orders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.wallet-orders.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.walletOrder.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            <span>

                                {{ trans('global.change_password') }}
                            </span>
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    <span>

                        {{ trans('global.logout') }}
                    </span>
                </a>
            </li>
        </ul>
    </section>
</aside>