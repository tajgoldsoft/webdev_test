$("#f1").submit(function(event) {
      event.preventDefault();
        $.ajax({
        url:     'reg.php', 
        type:     "POST",
        dataType: "html", 
        data: $("#f1").serialize(),  

        success: function(response) {
          result = $.parseJSON(response);
          if (result.res=='chek false') {
            alert("Номер или Логин - занять!!!")
          }
          else if (result.res=='insert false'){
            alert("Ошибка севера!!!")                      
          }
          else if (result.res=="insert true"){
            alert("Ура вы в системе!!!")
            document.getElementById("nas").value="";
            document.getElementById("nus").value="";
            document.getElementById("los").value="";
            document.getElementById("pas").value="";
            document.getElementById("s_i").click();
          }
         // 
          },
          error: function(response) { 
             alert("Сервер недоступен!!!")
          }
       });
    });
$("#f2").submit(function(event) {
      event.preventDefault();
        $.ajax({
        url:     'log.php', 
        type:     "POST",
        dataType: "html", 
        data: $("#f2").serialize(),  

        success: function(response) {
          result = $.parseJSON(response);
          if (result.res=='chek false') {
            alert("Пароль или Логин неверный!!!")
          }
          else {
              document.cookie = "tajgoldsoft.tj="+result.idu+"; max-age=3600";
              document.cookie = "tgs-news.ru="+result.nau+"; max-age=3600"; 
              document.getElementById("fio_user").innerHTML=result.nau;
              document.getElementById("body_div").innerHTML=result.tau; 
              document.getElementById("f2").classList.add('hide');
               document.getElementById("f1").classList.add('hide');
               document.getElementById("body_div").classList.remove('hide');
              document.getElementById("av_reg").innerHTML  ='<a href="#" id="e_i" onclick="exit(this);">Выход</a>';          
          }
          
         // 
          },
          error: function(response) { 
             alert("Сервер недоступен!!!")
          }
       });
    });
function login(e){
   // document.getElementById("body").innerHTML='<center><form name="f2" id="f2"><h1>Форма авторизации</h1><label>Логин</label><input type="text" name="login_user" id="los"><label>Пароль</label><input type="password" name="password_user" id="pas"><input type="submit" name="reg_user" id="reg_user" value="Авторизация"></form></center>';
    document.getElementById("av_reg").innerHTML='<a href="#" id="s_u" onclick="regis(this);">Регистрация</a>';
    document.getElementById("f1").classList.add('hide');
    document.getElementById("f2").classList.remove('hide');
}
function regis(e){
    //document.getElementById("body").innerHTML='<center><form name="f1" id="f1"><h1>Форма регистрации</h1><label>Имя</label><input type="text" name="name_user" id="nas"><label>Номер тел</label><input type="tel" name="number_user" id="nus"><label>Логин</label><input type="text" name="login_user" id="los"><label>Пароль</label><input type="password" name="password_user" id="pas"><input type="submit" name="reg_user" id="reg_user" value="Зарегистрироваться"></form></center>';
    document.getElementById("av_reg").innerHTML='<a href="#" id="s_i" onclick="login(this);">Вход</a>';
    document.getElementById("f2").classList.add('hide');
    document.getElementById("f1").classList.remove('hide');
}
function exit(e){
  deleteCookie();
 
  document.getElementById("body_div").classList.add('hide');
   document.getElementById("f2").classList.add('hide');
    document.getElementById("f1").classList.remove('hide');
    document.getElementById("fio_user").innerHTML="Гость";
    document.getElementById("av_reg").innerHTML='<a href="#" id="s_i" onclick="login(this);">Вход</a>';
}
function add_fav(e) {
   var afi=e.id;
   var idu=getCookie("tajgoldsoft.tj");
   $.ajax({
        url:     'inf.php', 
        type:     "POST",
        dataType: "html", 
        data: {'afi':afi,'idu':idu,'type':'a_f'},  

        success: function(response) {
          result = $.parseJSON(response);
          if (result.addfav=='true') {
            document.getElementById("s_"+afi).innerHTML='<a href="#" id="'+afi+'" onclick="del_fav(this);">Удалить из Избранние</a>';
          }
          else{
            alert("Ошибка севера!!!");
          }
          },
          error: function(response) { 
             alert("Сервер недоступен!!!")
          }
       });
} 
function del_fav(e) {
   var afi=e.id;
   var idu=getCookie("tajgoldsoft.tj");
   $.ajax({
        url:     'inf.php', 
        type:     "POST",
        dataType: "html", 
        data: {'afi':afi,'idu':idu,'type':'d_f'},  

        success: function(response) {
          result = $.parseJSON(response);
          if (result.delfav=='true') {
            document.getElementById("s_"+afi).innerHTML="<a href='#' id='"+afi+"' onclick='add_fav(this);'>Добавить в Избранние</a>";
          }
          else{
            alert("Ошибка севера!!!");
          }
          },
          error: function(response) { 
             alert("Сервер недоступен!!!")
          }
       });
}
window.onload=function(){
  if (document.cookie=="") {
    alert("Вы не авторизованый! Вам нужно Зарегистрироваться или авторизаваться!")
  }
  else{
    document.getElementById("fio_user").innerHTML=getCookie('tgs-news.ru');
       $.ajax({
        url:     'get.php',
        type:     "POST",
        dataType: "html", 
        data: {'idu':getCookie('tajgoldsoft.tj')},  

        success: function(response) {
          result = $.parseJSON(response);
            document.getElementById("body_div").innerHTML=result.tau;
            document.getElementById("body_div").classList.remove('hide');
            document.getElementById("f2").classList.add('hide');
               document.getElementById("f1").classList.add('hide');
            document.getElementById("av_reg").innerHTML='<a href="#" id="e_i" onclick="exit(this);">Выход</a>'; 

         // 
          },
          error: function(response) { 
             alert("Сервер недоступен!!!")
         }
    });
  }
  
  //alert(sessionStorage.getItem('key'));
  //sessionStorage.setItem('key', CryptoJS.MD5('value'));
}
function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
function deleteCookie() {
 document.cookie = "tajgoldsoft.tj=''; max-age=-1";
  document.cookie = "tgs-news.ru=''; max-age=-1";
}
function open_list(){
   //var afi=e.id;
   var idu=getCookie("tajgoldsoft.tj");
   if (idu!="") {
   $.ajax({
        url:     'inf.php', 
        type:     "POST",
        dataType: "html", 
        data: {'idu':idu,'type':'o_l'},  

        success: function(response) {
          result = $.parseJSON(response);
          
            document.getElementById("body_div").innerHTML=result.tau;
          
          },
          error: function(response) { 
             alert("Сервер недоступен!!!")
          }
       });
  }
  else{
    alert( "Вам недоступно!!!");
  }
}
function home() {
   $.ajax({
        url:     'get.php',
        type:     "POST",
        dataType: "html", 
        data: {'idu':getCookie('tajgoldsoft.tj')},  

        success: function(response) {
          result = $.parseJSON(response);
            document.getElementById("body_div").innerHTML=result.tau;
         // 
          },
          error: function(response) { 
             alert("Сервер недоступен!!!")
         }
    });
}