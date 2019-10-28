function vname() {
    var name=document.getElementById("username");
    if(name.value.length<=0 ){
        document.getElementById("cname").innerHTML="<font color='red'>请输入用户名！</font>"
    }else{
        document.getElementById("cname").innerHTML=" ";
    }
}
function vpassword() {
    var password=document.getElementById("pwd");
    var password2=document.getElementById("pwd2");
    if(password.value.length<=0){
        document.getElementById("cpassword1").innerHTML="<font color='red'>请输入密码！</font>";
    }else{
        document.getElementById("cpassword1").innerHTML=" ";
    }
    if(password2.value.length<0){
        document.getElementById("cpassword2").innerHTML="<font color='red'>确认下密码，省的忘记！</font>";
    }else{
        document.getElementById("cpassword2").innerHTML=" ";
    }
    if(password.value!=password2.value){
        document.getElementById("cpassword1").innerHTML="<font color='red'>两次密码不一样啦！</font>";
        document.getElementById("cpassword2").innerHTML="<font color='red'>再想一下吧</font>";
    }else {
        document.getElementById("cpassword1").innerHTML=" ";
        document.getElementById("cpassword2").innerHTML=" ";
    }
}
function phone() {
    var phone=document.getElementById("userphone");
    if(phone.value.length<=0 ){
        document.getElementById("cphone").innerHTML="<font color='red'>留下一个联系方式可好~</font>"
    }else{
        document.getElementById("cphone").innerHTML=" ";
    }
}


