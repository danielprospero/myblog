<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('admin_dashboard_assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">MYBLOG</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('admin.index') }}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                        </div>
                        <div class="menu-title">Posts</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.posts.index') }}"><i class="bx bx-right-arrow-alt"></i>Posts</a>
                        </li>
                        <li> <a href="{{ route('admin.posts.create') }}"><i class="bx bx-right-arrow-alt"></i>Novo</a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-category'></i>
                        </div>
                        <div class="menu-title">Categorias</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.categories.index') }}"><i class="bx bx-right-arrow-alt"></i>Categorias</a>
                        </li>
                        <li> <a href="{{ route('admin.categories.create') }}"><i class="bx bx-right-arrow-alt"></i>Nova</a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-tag'></i>
                        </div>
                        <div class="menu-title">Tags</div>
                    </a>

                    <ul>
                        <li> 
                            <a href="{{ route('admin.tags.index') }}"><i class="bx bx-right-arrow-alt"></i>Tags</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-comment'></i>
                        </div>
                        <div class="menu-title">Comentrários</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.comments.index') }}"><i class="bx bx-right-arrow-alt"></i>Comentrários</a>
                        </li>
                        <li> <a href="{{ route('admin.comments.create') }}"><i class="bx bx-right-arrow-alt"></i>Nova</a>
                        </li>
                        
                    </ul>
                </li>

                <hr>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-key'></i>
                        </div>
                        <div class="menu-title">Roles</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.roles.index') }}"><i class="bx bx-right-arrow-alt"></i>Roles</a>
                        </li>
                        <li> <a href="{{ route('admin.roles.create') }}"><i class="bx bx-right-arrow-alt"></i>Nova</a>
                        </li>
                        
                    </ul>
                </li>


                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user'></i>
                        </div>
                        <div class="menu-title">Usuários</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.users.index') }}"><i class="bx bx-right-arrow-alt"></i>Usuários</a>
                        </li>
                        <li> <a href="{{ route('admin.users.create') }}"><i class="bx bx-right-arrow-alt"></i>Nova</a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.contacts') }}">
                    <div class="parent-icon"><i class='bx bx-mail-send'></i></div>
                        <div class="menu-title">Contatos</div>
                    </a>
                </li>

            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->