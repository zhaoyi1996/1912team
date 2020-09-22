
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/indexshop/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/indexshop/css/pages-register.css" />
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="login.html" target="_blank">登陆</a></span></h3>
			<h3>注册新用户<span class="go">我有账号，去<a href="{{url('/index/login')}}" target="_blank">登陆</a></span></h3>
			<div class="info">
				<form class="sui-form form-horizontal" onsubmit="javascript:return check()">
				<!-- <div ></div> -->
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的用户名" name="user_name" id="user_name" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" placeholder="设置登录密码" name="user_pwd" id="user_pwd" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" placeholder="再次确认密码" name="user_pwds" id="user_pwds" class="input-xfat input-xlarge">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">邮箱：</label>
						<div class="controls">
							<input type="text" name="user_email" id="user_email" placeholder="请输入你的邮箱号" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">邮箱验证码：</label>
						<div class="controls">
							<input type="text" placeholder="短信验证码"  class="input-xfat input-xlarge">  
							<input type="text" placeholder="短信验证码" id="user_code" class="input-xfat input-xlarge">  
							<button class="but" id="sendcode">获取邮箱验证码</button>
						</div>
					</div>
					
					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<button id="button" class="sui-btn btn-block btn-xlarge btn-danger" href="home.html" target="_blank">完成注册</button>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>


<script type="text/javascript" src="/indexshop/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/indexshop/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/indexshop/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/indexshop/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/indexshop/js/pages/register.js"></script>
<script>
// 阻止表单提交
<<<<<<< HEAD
	$("form").submit(function(){
		return false;
	})
=======
    function check(){
        return false;
    }
	// $("form").submit(function(){
	// 	return false;
	// })
>>>>>>> heyuhao
	$("#sendcode").click(function(){
		var user_email = $("#user_email").val();
        var reg=/^[a-z0-9]{5,}@[a-z0-9]{2,5}\.com$/;
        if(user_email==""){
            alert("邮箱不可为空");
            return false;
        }else if(!reg.test(user_email)){
            alert("邮箱格式不正确");
            return false; 
        }
        // 定时器
            $("#sendcode").text("60s");
            // 清除定时器
            $("#sendcode").css("pointer-events","none");
            // 秒数-1
            set=setInterval(goTime,1000);

        //将获取到的邮箱传递给后台
        $.ajax({
            type:'post',
            url:'/index/sendEmail',
            // dataType:'json',
            data:{user_email:user_email},
            success:function(res){
                if(res.code==1){
                    alert(res.msg)
                }
                if(res.code==0){
                    alert(res.msg)
                }
            }
        })
    })

    // 定时器
        function goTime(){
            // 获取秒数的值
            var sec= parseInt($("#sendcode").text());
            // console.log(typeof sec);
            if(sec<=0){
                $("#sendcode").text("获取");
                clearInterval(set);//清除定时器
                // 按钮生效
                $("#sendcode").css("pointer-events","auto");
            }else{
            // 秒数减一
            sec=sec-1;
            // 吧减后的秒数放回去
            $("#sendcode").text(sec+"s");
            // 按钮失效
            $("#sendcode").css("pointer-events","none");
            }
            
        }
        //提交数据
        $("#button").click(function(){
        	//获取值
        	var user_name = $("#user_name").val();
        	var user_pwds = $("#user_pwds").val();
        	var user_pwd = $("#user_pwd").val();
        	var user_email = $("#user_email").val();
<<<<<<< HEAD
=======
            var user_code = $("#user_code").val();
>>>>>>> heyuhao
        	if(user_name==''){
        		alert("用户姓名不可为空");
        		return false;
        	}
<<<<<<< HEAD
=======
            if(user_pwd==''){
                alert("用户名密码不可为空");
                return false;
            }
            if(user_pwds==''){
                alert("确认密码不可为空");
                return false;
            }
            if(user_pwd!==user_pwds){
                alert("密码与确认密码不同");
                return false;
            }
            if(user_email==''){
                alert("邮箱不可为空");
                return false;
            }
            if(user_code==''){
                alert("验证码不可为空");
                return false;
            }
            $.ajax({
                type:"post",
                url:"/index/regdo",
                data:{user_name:user_name,user_pwd:user_pwd,user_pwds:user_pwds,user_email:user_email,user_code:user_code},
                success:function(res){
                    if(res.code==1){
                        alert(res.msg)
                    }
                    if(res.code==0){
                        alert(res.msg)
                        // window.location.href="http://www.1912team.com/index/login";
                    }
                }
            })
>>>>>>> heyuhao
        })
	
</script>
</body>
</html>