var code ; //在全局 定义验证码
function createCode()
{
    code = "";
    var codeLength = 4;//验证码的长度
    var checkCode = document.getElementById("yanzhengma");
    var selectChar =new Array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j',
        'k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    //所有候选组成验证码的字符，当然也可以用中文的
    for(var i=0;i
    <codeLength;i++)
    {
        var charIndex = Math.floor(Math.random()*36);
        code +=selectChar[charIndex];
    }
    if(checkCode)
    {
        checkCode.className="code";
        checkCode.value = code;
    }
}
function validate_name ()
{
    var name=document.getElementById("name");
    if(name.value.length<0 ){
        document.getElementById("s_name").innerHTML="<font color='red'>请输入用户名！</font>"
    }else{
        document.getElementById("s_name").innerHTML=" ";
    }
}
function validate_password() {
    var password=document.getElementById("password");
    if(password.value.length<=0){
        document.getElementById("s_password").innerHTML="<font color='red'>请输入密码！</font>"
    }
    else{
        document.getElementById("s_password").innerHTML=" ";
    }
}
function validate_yanzheng() {
    var inputCode = document.getElementById("yanzheng").value;
    if(inputCode.length <=0){
        document.getElementById("s_yanzheng").innerHTML="<font color='red'>请输入验证码！</font>"
    }
    else if(inputCode != code )
    {
        document.getElementById("s_yanzheng").innerHTML="<font color='red'>验证码错误！</font>"
        createCode();//刷新验证码
    }
    else {
        document.getElementById("s_yanzheng").innerHTML=""
    }
}

