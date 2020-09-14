
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>团队开发后台模板@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  

    <link rel="stylesheet" href="/shop/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/shop/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/shop/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/shop/css/style.css">
    
    <script src="/shop/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/shop/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script src="/shop/plugins/bootstrap/js/bootstrap.min.js"></script>
  
    <script src="/shop/plugins/adminLTE/js/app.min.js"></script>
    
    <script type="text/javascript">   
		 function SetIFrameHeight(){
		  	  var iframeid=document.getElementById("iframe"); //iframe id
		  	  if (document.getElementById){
		  		iframeid.height =document.documentElement.clientHeight;			   	   
			  }
		 }
    
	</script>    
 
</head>

<body class="hold-transition skin-green sidebar-mini" >

    <div class="wrapper">

        <!-- 页面头部 -->
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>rbac</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>后台角色权限管理</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                       
                        <!-- Notifications: style can be found in dropdown.less -->
                      
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/shop/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">测试用户</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/shop/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                       测试用户 - 浪里小白龙
                                        <small>最后登录 11:20AM</small>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">修改密码</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">注销</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- 页面头部 /-->

        <!-- 导航侧栏 -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/shop/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> 测试用户</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                    </div>
                </div>
              
                <!-- /.search form -->


                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu"  >
                    <li class="header">菜单</li>
                    <li id="admin-index"><a href="{{url('/rbac')}}"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>

				    <!-- 菜单 -->
				    <li class="treeview">
				        <a href="#">
				            <i class="fa fa-folder"></i> 
				            <span>权限管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
				        </a>
				        <ul class="treeview-menu">
				
				            <li id="admin-login">
				                <a href="{{url('/rbac/seller1')}}" target="iframe">
				                    <i class="fa fa-circle-o"></i>权限添加
				                </a>
				            </li>
							<li id="admin-login">
				                <a href="{{url('/rbac/seller')}}" target="iframe">
				                    <i class="fa fa-circle-o"></i>权限列表
				                </a>
				            </li>
				        </ul>                        
				    </li>
					<li class="treeview">
				        <a href="#">
				            <i class="fa fa-folder"></i> 
				            <span>角色管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
				        </a>
				        <ul class="treeview-menu">
				
				        
							<li id="admin-login">
				                <a href="{{url('/rbac/cate')}}" target="iframe">
				                    <i class="fa fa-circle-o"></i>角色添加
				                </a>
				            </li>
							<li id="admin-login">
				                <a href="{{url('/rbac/goods')}}" target="iframe">
				                    <i class="fa fa-circle-o"></i>角色列表
				                </a>
				            </li>
				        </ul>                        
				    </li>
					
					<li class="treeview">
				        <a href="#">
				            <i class="fa fa-folder"></i> 
				            <span>管理员管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
				        </a>
				        <ul class="treeview-menu">
				
				            <li id="admin-login">
				                <a href="{{url('/rbac/category')}}" target="iframe">
				                    <i class="fa fa-circle-o"></i>管理员添加
				                </a>
				            </li>
							<li id="admin-login">
				                <a href="{{url('/rbac/content')}}" target="iframe">
				                    <i class="fa fa-circle-o"></i>管理员列表
				                </a>
				            </li>
				        </ul>                        
				    </li>
				    <!-- 菜单 /-->

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- 导航侧栏 /-->

        
        <!-- 内容区域 -->
         <div class="content-wrapper">
            <!-- // 内容区域-->
                 @yield('content')
        </div>

       

        <!-- 内容区域 /-->

        <!-- 底部导航 -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.8
            </div>
            <strong>Copyright &copy; 2014-2017 <a href="http://www.itcast.cn">研究院研发部</a>.</strong> All rights reserved.
        </footer>
        <!-- 底部导航 /-->

    </div>

</body>

</html>