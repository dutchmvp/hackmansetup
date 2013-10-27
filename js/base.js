var tfuNotificationSystem = {
	init:function(){
      tfuNotificationSystem.tabNavigation();
      tfuNotificationSystem.clickHandlers();
	},
	clickHandlers:function(){
      $('#createContactButton').click(function(){
      	  tfuNotificationSystem.createContact();
      });
	},
	tabNavigation:function(){
      $('#navigation li').click(function(){
         var tab = $(this).index();
         $('#navigation li').removeClass('active');
         $(this).addClass('active')
         $('.content').fadeOut();
         $('.content').eq(tab).fadeIn();
      });
	},
	createContact:function(){
      var number = $('#number').val();
      var email = $('#email').val();
      var name = '@'+$('#name').val();
      var user = $('#user').val();
      var twitter = $('#twitter').val();
      var data = 'userId='+user+'&name='+name+'&number='+number+'&email='+email+'&twitter='+twitter
      $.ajax({
      	url:'/hackmansetup/addContact.php?',
         data:data,
      	type:'post',
      	success:function(data){
           $('.inputHolder input').val('');
           $('#createContactButton').after('Contact Created');

      	},
      	error:function(){
      		 $('.inputHolder input').val('');
           $('#createContactButton').after('Unable to create contact');
      	}
      });
	}
};

$('document').ready(function(){
   tfuNotificationSystem.init();
});