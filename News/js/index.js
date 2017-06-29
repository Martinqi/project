/**
 * Created by Administrator on 2017/6/11.
 */
$(document).ready(function () {
    $('button').click(function (e) {
        history.go(-1);
    });


    //banner
    let box=document.querySelector('.banner');
    let imgbox=document.querySelector('.banner ul');
    let img=document.querySelectorAll('.banner ul li');
    let width=parseInt(getComputedStyle(box,null).width);
    let left=document.querySelector('.left');
    let right=document.querySelector('.right');
    let t=setInterval(movel,2500);
//            let m=setInterval(mover,1500);
    let flag=true;
    function movel() {
        animate(imgbox,{left:-width},function () {
            let first=imgbox.firstElementChild;
            imgbox.appendChild(first);
            imgbox.style.left=0;
            flag=true
        })
    }
    box.onmouseover=function(){
        clearInterval(t);
        left.style.cssText="display:block";
        right.style.cssText="display:block";
    };
    box.onmouseout=function () {
        t=setInterval(movel,1500);
        left.style.cssText="display:none";
        right.style.cssText="display:none";
    };

    left.onclick=function () {
        if(flag){
            flag=false;
            let last=imgbox.lastElementChild;
            let first=imgbox.firstElementChild;
            imgbox.insertBefore(last,first);
            imgbox.style.left=-width+'px';
            animate(imgbox,{left:0},function () {
                flag=true
            })
        }
    }

    right.onclick=function () {
        if(flag){
            flag=false;
            movel()
        }
    }

});

