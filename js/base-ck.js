var tfuNotificationSystem={init:function(){tfuNotificationSystem.tabNavigation();tfuNotificationSystem.clickHandlers()},clickHandlers:function(){$("#createContactButton").click(function(){tfuNotificationSystem.createContact()})},tabNavigation:function(){$("#navigation li").click(function(){var e=$(this).index();$("#navigation li").removeClass("active");$(this).addClass("active");$(".content").fadeOut();$(".content").eq(e).fadeIn()})},createContact:function(){var e=$("#number").val(),t=$("#email").val(),n=$("#name").val(),r=$("#user").val(),i=$("#twitter").val(),s="userId="+r+"&name="+n+"&number="+e+"&email="+t+"&twitter="+i;alert(s);$.ajax({url:"/hackmansetup/addContact.php?"+s,data:s,type:"post",success:function(e){alert(e)},error:function(){alert("<fail></fail>")}})}};$("document").ready(function(){tfuNotificationSystem.init()});