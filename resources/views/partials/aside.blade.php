<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret bg-white" id="sidenav-main">
    <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" {{route('admin.home')}} " target="_blank">
        <img src="/image/lord.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="me-1 font-weight-bold">Lords Luxury</span>
    </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.home')}}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">dashboard</i>
                </div>
                <span class="nav-link-text me-1">الرئيسية</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.shoes.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">roller_skating
                    </i>
                </div>
                <span class="nav-link-text me-1">الاحذية</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.shoes-options.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">roller_skating
                    </i>
                </div>
                <span class="nav-link-text me-1"> صفات الاحذية</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.wearables.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">checkroom
                    </i>
                </div>
                <span class="nav-link-text me-1">الملبوسات</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.wearable-options.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">checkroom
                    </i>
                </div>
                <span class="nav-link-text me-1">صفات الملبوسات</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.slippers.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">do_not_step
</i>
                </div>
                <span class="nav-link-text me-1">الشباشب</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.slipper-options.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">do_not_step
</i>
                </div>
                <span class="nav-link-text me-1">صفات الشباشب</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.perfumees.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">local_drink
                    </i>
                </div>
                <span class="nav-link-text me-1">العطور</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.wallets.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">account_balance_wallet
                    </i>
                </div>
                <span class="nav-link-text me-1">المحافظ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../pages/dashboard.html">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">list_alt
                    </i>
                </div>
                <span class="nav-link-text me-1">الطلبات</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.customers.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">diversity_3
                    </i>
                </div>
                <span class="nav-link-text me-1">الزبائن</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.users.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">manage_accounts
                    </i>
                </div>
                <span class="nav-link-text me-1">المستخدمين</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.roles.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">task_alt
                    </i>
                </div>
                <span class="nav-link-text me-1">المهام</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.permissions.index") }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10 text-black">rule
                    </i>
                </div>
                <span class="nav-link-text me-1">الصلاحيات</span>
            </a>
        </li>
        
    </ul>
    </div>

</aside>