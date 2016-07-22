<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--移动设备优先,为了确保适当的绘制和触屏缩放，需要在 <head> 之中添加 viewport 元数据标签。-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="renderer" content="webkit">
	<meta name="keywords" content="博客,个人博客,Gavin的博客">
	<meta name="description" content="这是Gavin的个人博客">
	<!-- Laravel token 存放在 meta 标签中, 然后使用 jQuery 将它加入到所有的请求头中-->
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- 在移动设备浏览器上，通过为视口（viewport）设置 meta 属性为 user-scalable=no 可以禁用其缩放（zooming）功能。
        这样禁用缩放功能后，用户只能滚动屏幕，就能让你的网站看上去更像原生应用的感觉。注意，这种方式不推荐所有网站使用，需看情况而定-->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
	{{--<link rel="shortcut icon" href="/favicon.ico">--}}

	<title>@yield('title','Gavin\' Blog')</title>

	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('/style/auth/index.css') }}">
</head>
<body>
	<div class="index-main">
		<div class="index-main-body">
			<div class="header">
				<p class="title">Gavin's Blog</p>
				<p class="subtitle">宁愿小众,不愿平庸</p>
			</div>
			<div class="body">
				<div class="tab-select">
					<a class="tab_select_add_color" href="#tab-login" aria-controls="tab-login" role="tab" data-toggle="tab" id="toggle-login">登录</a>
					<a href="#tab-register" aria-controls="tab-register" role="tab" data-toggle="tab" id="toggle-register">注册</a>
					<span class="tab-slider-line"></span>
				</div>
				@if (count($errors) > 0)
					<div>
						<strong>出错了</strong>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="tab-content">
					<div role="tabPanel" class="tab-pane active" id="tab-login">
						<form id="form-login" role="form">
							<div class="group-inputs">
								<div class="input-wrapper">
									<input type="email" class="form-control-blog" name="email" placeholder="邮箱" value="{{ old('email') }}">
								</div>
								<div class="input-wrapper">
									<input type="password" class="form-control-blog" name="password" placeholder="密码">
								</div>
							</div>
							<div class="wrapper-button">
								<button id="btn-login" type="button" class="btn btn-primary btn-lg btn-block">登录</button>
							</div>
							<div class="remember-wrapper">
								<label class="remember-me">
									<input type="checkbox" name="remember" checked value="true">记住我
								</label>
								{{--<a class="pull-right" href="{{ url('/password/email') }}">无法登录?</a>--}}
								<a class="pull-right" href="javascript:void(0)">无法登录?</a>
							</div>
						</form>
					</div>
					<div role="tabPanel" class="tab-pane" id="tab-register">
						<form id="form-register" role="form">
							<div class="group-inputs">
								<div class="input-wrapper">
									<input type="text" class="form-control-blog" name="name" placeholder="姓名" autocomplete="off">
								</div>
								<div class="input-wrapper">
									<input type="email" class="form-control-blog" name="email" placeholder="邮箱" autocomplete="off">
								</div>
								<div class="input-wrapper">
									<input type="password" class="form-control-blog" name="password" placeholder="密码 (不少于 6 位)" autocomplete="off">
								</div>
								<div class="input-wrapper">
									<input type="text" class="form-control-blog" name="captcha" placeholder="验证码" autocomplete="off">
									<img class="captcha" src="{{ url('/captcha/register') }}" alt="验证码">
								</div>
							</div>
							<div class="wrapper-button">
								<button id="btn-register" type="button" class="btn btn-primary btn-lg btn-block">注册</button>
							</div>
						</form>
					</div>
				</div>
				<div class="tab-footer">
					<div class="other-sign-wrapper">
						<span>社交帐号登录</span>
						<div class="sns-login">
							<a href="javascript:void(0)"><i class="fa fa-weibo"></i></a>
							<a href="javascript:void(0)"><i class="fa fa-weixin"></i></a>
							<a href="javascript:void(0)"><i class="fa fa-qq"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- 版权等信息 -->
	<footer class="footer text-center">
		<div class="container">
			<div class="copyright inline" itemscope itemtype="http://www.isgavin.me">
				©  2014 -
				<span itemprop="copyrightYear">2016</span>
				<a itemprop="copyrightHolder" href="http://www.isgavin.me">Gavin</a>
			</div>
			<span class="dot"></span>
			<div class="record inline" >
				<a href="http://www.miibeian.gov.cn/" target="_blank">津 ICP 备 15004268 号</a>
			</div>
		</div>
	</footer>

	<!-- 粒子背景 -->
	<div id="particles-js"></div>

	<script src="{{ asset('/vendor/seajs-3.0.0/dist/sea.js') }}"></script>
	<script src="{{ asset('/script/config/seajs-config.js') }}"></script>
	<script src="{{ asset('/script/auth/index.js') }}" ></script>
</body>
</html>