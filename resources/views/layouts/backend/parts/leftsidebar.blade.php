   <!-- BEGIN: Main Menu-->
   <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
        <img src="#" style="width:50%;height:40px;margin:0 auto">
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul  class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="#"><a href="#"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            <li class="#"><a href="{{route('category.index')}}"><i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Dashboard">Category</span></a></li>
            <li class="#"><a href="{{route('product.index')}}"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard">Product</span></a></li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
