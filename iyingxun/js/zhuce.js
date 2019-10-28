function v_zc_name() {
    var name=document.getElementById("zc_name");
    if(name.value.length<=0 ){
        document.getElementById("zs_name").innerHTML="<font color='red'>请输入用户名！</font>"
    }else{
        document.getElementById("zs_name").innerHTML=" ";
    }
}
function v_zc_password() {
    var password=document.getElementById("password1");
    var password2=document.getElementById("password2");
    if(password.value.length<=0){
        document.getElementById("zs_password1").innerHTML="<font color='red'>请输入密码！</font>";
    }else{
        document.getElementById("zs_password1").innerHTML=" ";
    }
    if(password2.value.length<0){
        document.getElementById("zs_password2").innerHTML="<font color='red'>确认下密码，省的忘记！</font>";
    }else{
        document.getElementById("zs_password2").innerHTML=" ";
    }
    if(password.value!=password2.value){
        document.getElementById("zs_password1").innerHTML="<font color='red'>两次密码不一样啦！</font>";
        document.getElementById("zs_password2").innerHTML="<font color='red'>再想一下吧</font>";
    }else {
        document.getElementById("zs_password1").innerHTML=" ";
        document.getElementById("zs_password2").innerHTML=" ";
    }
}
function v_zc_phone() {
    var phone=document.getElementById("phone");
    if(phone.value.length<=0 ){
        document.getElementById("zs_phone").innerHTML="<font color='red'>留下一个联系方式可好~</font>"
    }else{
        document.getElementById("zs_phone").innerHTML=" ";
    }
}

