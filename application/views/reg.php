<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registraition</title>
  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
  <script> 

 function validate(evt) {
var el = $('#mail');
if (el.is(":focus")){
    regex =  /[0-9a-zA-Z_@.]/;
	 
} else {
 regex = /[0-9a-zA-Z_]/;
  }
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


  
  $(document).ready(function() {
 


$('.btn').click(function() { 
i=0;
spec_user='';
value='';
    while (i<3) {
     i++;
     option='#p'+i;
     if ( $(option).prop("checked") )  {
        if (i==1) {spec_user+='Композитор ';};
        if (i==2) {spec_user+='Дизайнер ';};
        if (i==3) {spec_user+='Долбаеб ';};
      }
     }
  login = $("input[name='login']").val();
  email = $("input[name='email']").val();
  pass = $("input[name='pass']").val();
  pass2 = $("input[name='password2']").val();
  famil = $("input[name='famil']").val();
  name = $("input[name='name']").val();
  otchestvo = $("input[name='otchestvo']").val();
  birthday= $("input[name='birthday']").val();
  avatar= $("input[name='avatar']").val();
	if (login.length >= 3 && pass.length >= 3) {
	if (pass == pass2) {
	$.post("sendreg",
     {
     login : login, email : email, pass : pass, famil : famil, name : name,
       otchestvo : otchestvo, birthday : birthday, avatar : avatar, spec_user : spec_user,     },
     onAjaxSuccess
   );
   } else {
$('#pad').html('пароли не совпадают');
}   
}else
{
$('#pad').html('минимальное значение любого поля - 3 символа');
}

   function onAjaxSuccess(data)
   {
     	 
 if (data== 'yzhe') {
 $('#pad').html('такой юзер есть');
 } else {
  if (data=='xren') {
     $('#pad').html('символы не те');
  } else {
     location.href='/ci';
  }
 }
          };
          
   
   
}); 
 

 
 
 });
  </script>
</head>
<body>

<div id="container">
	<h1>Регистрация !</h1>

	<div id="body">

<label class="checkbox">
    <input type="checkbox" name="spec_user" id="p1" value="Композитор"> Композитор <br>
    <input type="checkbox" name="spec_user" id="p2" value="Фотограф"> Фотограф <br>
    <input type="checkbox" name="spec_user" id="p3" value="Долбоеб"> Долбоеб <br>
</label>

    <input type="text" name ="famil" maxlength="20" class="input-small" placeholder="Фамилия"><br>
    <input type="text" name ="name"  maxlength="20" class="input-small" placeholder="Имя"><br>
    <input type="text" name ="otchestvo"  maxlength="20" class="input-small" placeholder="Отчество"><br>
    <input type="text" name ="birthday"  maxlength="20" class="input-small" placeholder="Дата рождения"><br>
    <input type="text" name ="avatar" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Аватар"><br>

  <input type="text" name ="login" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Логин" ><br>
<input type="text" id="mail"  name="email" onkeypress='validate(event)' maxlength="40" class="input-small" placeholder="Email"><br>
  <input type="password" name ="pass" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Пароль"><br>
    <input type="password" name ="password2" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Повторите Пароль">
	<div style="margin-left: 30px;
height: 20px;
width: 270px;" id="pad">  </div> 

  <button  class="btn">Зарегестрироваться</button>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>