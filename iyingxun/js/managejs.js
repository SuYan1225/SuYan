function validate_zh() {
    var zh=document.getElementById("zh");
    if(zh.value.length<=0 ){
        document.getElementById("szh").innerHTML="<font color='red'>请输入用户名！</font>"
    }else{
        document.getElementById("szh").innerHTML=" ";
    }
}
function validate_pwd() {
    var pwd=document.getElementById("pwd");
    if(pwd.value.length<=0){
        document.getElementById("spwd").innerHTML="<font color='red'>请输入密码！</font>"
    }
    else{
        document.getElementById("spwd").innerHTML=" ";
    }
}
