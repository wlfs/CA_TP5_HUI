
		function chkvaluefoot(telfootnumber){
			document.getElementById("dialogfoot").style.display = "none";
            //document.getElementById("telfootnumber").value = "请输入您的电话号码";
		}
        function openDialogfoot(e) {
            document.getElementById("dialogfoot").style.display = "block";
           document.getElementById("telfootnumber").value = "";
            e = e||window.event;
            if(+'\v1') {
                e.stopPropagation();
            } else  {
                e.cancelBubble = true;
            }
             
        }
        function tell() {
			var _m=tel_getCookie(key);
			if(_m==null||_m.length!=11){
				var index=layer.prompt({
					title: '请输入你的手机号',
					formType: 0 
				}, function(mobile){
					if(mobile.length==11){
						tel_setCookie(key,mobile);
						layer.close(index);
					}else{
						layer.alert("手机号码格式不正确");
					}
				});
			}
		}
		var key="tell_mobile";
		function tel_setCookie(name,value)
		{
			var Days = 30;
			var exp = new Date();
			exp.setTime(exp.getTime() + Days*24*60*60*1000);
			document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
		}
		function tel_getCookie(name)
		{
			var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
			if(arr=document.cookie.match(reg))
				return unescape(arr[2]);
			else
				return null;
		}


document.writeln('<div class="phonebar">');
document.writeln('<div class="callbar">');
document.writeln('<input type="text" id="telfootnumber" value="请输入您的电话号码" class="fteltxt"  name="q" onclick="openDialogfoot(event)" onblur="chkvaluefoot(this)"/>');
document.writeln('<input type="submit" id="callBtnfoot" class="ftelbtn" name="button" value="拨号"/>');
document.writeln('</div></div> ');


document.write('<div id="dialogfoot" style="position:absolute;left:52%;top:120px;background-color:#FFECBF;z-index: 2147483647;width:320px;height:80px;display:none; padding:10px;"><a style="font-size:12px;line-height:1.2em;height:12px;right:5px;top:5px;font-weight:bold;font-family:宋体;cursor:pointer;color:#000;display:block;float:right;">╳</a><b style="background:url(/img/cb-tip-icon.png) 0 -8px no-repeat;padding-left:15px;display:block;font-weight:100;">手机请直接输入：如1860086xxxx</b><b style="background:url(/img/cb-tip-icon.png) 0 -22px no-repeat;padding-left:15px;display:block;font-weight:100;">座机前加区号：如0105992xxxx</b><p style="display:block;color:#C60;">输入您的电话号码，点击通话，稍后您将接到我们的电话，该通话对您<b style="font-size:14px;">完全免费</b>，请放心接听！</p></div>' );


document.getElementById("callBtnfoot").onclick = function () {
		var _m=tel_getCookie(key);
			if(_m==null||_m.length!=11){
				var index=layer.prompt({
					title: '请输入你的手机号',
					formType: 0 
				}, function(mobile){
					if(mobile.length==11){
						tel_setCookie(key,mobile);
						document.getElementById("telfootnumber").value = mobile;
						layer.close(index);
					}else{
						layer.alert("手机号码格式不正确");
					}
				});
			}else{
				document.getElementById("telfootnumber").value = _m;
				lxb.call(document.getElementById("telfootnumber"));
			}
	
	};
	document.write('<script type="text/javascript"  data-lxb-uid="21993510" data-lxb-gid="287877" src="http://lxbjs.baidu.com/api/asset/api.js?t=' + new Date().getTime() + '" charset="utf-8"><\/script>' );



try{
	var t;
	$(function(){
		$(window).scroll(function(e) {
			clearTimeout(t);
			t = setTimeout(function(){
			$(".phonebar").animate({bottom:"25px"})
			$(".phonebar").animate({bottom:"0px"})
			},500);
		});
		
		$("#telnumber").hover(function(){$("#lxb-tc").show();},function(){$("#lxb-tc").hide();});
		
	})
	function chc(o){
		$(o).val("");	
		$(o).css("color","#6c6c6c");
	}
}catch(e){
	//pjCatch(129,e);
}