$(function () {
	$('.wp-inner').fullpage();
	$('.page5 img.btn-submit').click(function(){
		$('.page5 >img').hide();
		$('#twtJoinLogin').show();
	})
	function onLoginSubmitClick () {
		$.ajax({
			url:"http://coder.twtstudio.com/index.php/home/api/login",
			data: {
				account: inputAccount.value,
				password: inputPassword.value
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				if (data.code) {
					data = data.data;
					inputName.value = data.name;
					inputCollege.value = data.college;
					$('#twtJoinLogin').hide();
					$('#twtJoinFormWrap').show();
				} else {
					alert(data.msg);
				}
			}
		});
	}
	$('.btn-login').click(function () {
		onLoginSubmitClick();
	});
	$('.btn-join').click(function () {
		onSubmitClick();
	});
	function onSubmitClick () {
		$.ajax({
			url:"http://coder.twtstudio.com/index.php/home/api/submit",
			data: {
				phone: inputContact.value,
				reason: inputReason.value
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				if(data.code)
				{
					$('#twtJoinFormWrap').hide();
					$('#twtJoinResult').show();
				} else {
					alert(data.msg);
				}
			}
		});
	}
	function isWeChat () {
		var ua = window.navigator.userAgent.toLowerCase();
		if (ua.indexOf('micromessenger') != -1) {
			return true;
		}
		return false;
	}
	if (isWeChat()) {
		$.ajax({
			url: 'http://wechat.twtstudio.com/api/jsapi',
			dataType: 'jsonp',
			data: {
				url: encodeURIComponent(window.location.href.split('#')[0]),
			},
			success: function (data) {
				if (data.code === 0) {
					setConf(data.data);					
				}
			}
		});
		function setConf(data) {
			wx.config({
				debug: false,
				appId: data.appid,
				timestamp: data.timestamp,
				nonceStr: data.noncestr,
				signature: data.signature,
				jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQZone', 'onMenuShareQQ'],
				success: function () {
					wx.ready(function () {
						wx.onMenuShareTimeline({
						    title: '天外天工作室秋季纳新·Stay With Me',
						    link: 'http://coder.twtstudio.com/hr',
						    imgUrl: 'http://coder.twtstudio.com/hr/images/avatar.png',
						});
						wx.onMenuShareAppMessage({
							title: '天外天工作室秋季纳新·Stay With Me',
							desc: '青春无极限，天外更有天',
							link: 'http://coder.twtstudio.com/hr',
							imgUrl: 'http://coder.twtstudio.com/hr/images/avatar.png',
						});
						wx.onMenuShareQZone({
							title: '天外天工作室秋季纳新·Stay With Me',
							desc: '青春无极限，天外更有天',
							link: 'http://coder.twtstudio.com/hr',
							imgUrl: 'http://coder.twtstudio.com/hr/images/avatar.png',
						});
						wx.onMenuShareQQ({
							title: '天外天工作室秋季纳新·Stay With Me',
							desc: '青春无极限，天外更有天',
							link: 'http://coder.twtstudio.com/hr',
							imgUrl: 'http://coder.twtstudio.com/hr/images/avatar.png',
						})
					});
				},
			});
		}
	}
});