$(function (){
    var oneul = $('.one ul'); //声明一个变量找到图片的ul
    var oneulli = $('.one ul li'); //声明一个变量找到图片的ul li
    var twoulli = $('.two ul li'); //声明一个变量找到轮播按钮 ul li
    var Awidth = oneulli.eq(0).width(); //声明一个变量找到声明图片的(ul li)=oneulli的那个变量 从0开始eq(0) 宽度width()
    var count=0; //用来计数
    var time=null; //用来计时间

    twoulli.on('click',function(){
        $(this).addClass('a').siblings().removeClass('a'); //addClass()添加 siblings()同胞元素 removeClass()移除
        count=$(this).index();
        oneul.animate({"left":-count*Awidth}); //四张图片依次向左滑动
    })

    time=setInterval(lun,2000);
    function lun(){ //lun 调用上面命名
        count++; //js运算符 %= 取模 就是去得它的余数 18
        count%=twoulli.length;
        twoulli.eq(count).trigger('click');
    }
})