<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

              <li class="text-muted menu-title">Navigation</li>
                  
                @can('admin-access')
                  <li>
                    <a href="{{ route('backend') }}" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-pin-alt"></i><span> Posts </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('admin.post.index') }}"> All Posts</a></li>
                            <li><a href="{{ route('admin.category.index') }}"> Categories</a></li>
                            <li><a href="#"> Tags</a></li>
                        </ul>
                    </li>
                  </li>

                  <li class="text-muted menu-title">Settings</li>
                  <li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i><span> Settings </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('admin.user.index') }}"> Users</a></li>
                        </ul>
                    </li>
                  </li>
                @endcan
                
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
