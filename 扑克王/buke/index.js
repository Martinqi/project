/**
 * Created by Administrator on 2017/4/10.
 */
$(document).ready(function () {
    let arr=[];
    let stylearr=['c','d','h','s'];
    let mark=[];
    while(arr.length<52){
        let number=Math.ceil(Math.random()*13);
        let style=stylearr[Math.floor(Math.random()*stylearr.length)];
        if (!mark[number+style]){
            mark[number+style]=true;
            arr.push({number,style});
        }
    }
    let n=0;
    for(let i=0;i<7;i++){
        for(let j=0;j<i;j++){
            $("<li class='pai'>").attr('id',i+'-'+j).attr('value',arr[n].number).css('background',`url(img/${arr[n].number}${arr[n].style}.png)`).delay(n*60).animate({left:300-i*50+100*j,top:i*50,opacity:1},600).appendTo('ul');
            n++;
        }
    }
    for (;n<52;n++){
        $("<li class='pai old'>").attr('id','s'+'-'+n).attr('value',arr[n].number).css('background',`url(img/${arr[n].number}${arr[n].style}.png`).delay(n*60).animate({left:100,top:470,opacity:1},600).appendTo('ul')
    }
    let current=null;
    $('.pai').click(function () {
        let x=$(this).attr('id').split('-')[0];
        let y=$(this).attr('id').split('-')[1];
        if($(`#${parseInt(x)+1}-${parseInt(y)}`).length==1||$(`#${parseInt(x)+1}-${parseInt(y+1)}`).length==1){
            return;
        }
        $(this).toggleClass('active')
    if(!current){
        current=$(this);
        if (parseInt($(this).attr('value'))===13){
            $(this).animate({
                left:600,top:0,opacity:0
            },500,function () {
                $(this).remove();
                current=null
            })
        }
    }else{
        if(parseInt(current.attr('value'))+parseInt($(this).attr('value'))===13){
            $('.active').animate({
                left:600,top:0,opacity:0
            },500,function () {
                $('.active').remove();
                current=null
            })
        }else{
            setTimeout(function () {
                $('.active').removeClass('active');
                current=null;
            },300)
        }
    }
  });
    let left=$('button:nth-child(1)');
    let right=$('button:nth-child(2)');
    let index=1;
    right.click(function () {
        $('.old').last().removeClass('old').addClass('new').animate({
            left:450,
        },500).css('z-index',index++)
    })
    left.click(function () {
        $('.new').removeClass('new').addClass('old').each(function (index){
            $(this).delay(index*100).animate({
                left:100
            },500).css('z-index',index++);
        })
    })
    $('button:nth-child(3)').click(function () {
        history.go(0)
    })
});