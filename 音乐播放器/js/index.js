/**
 * Created by Administrator on 2017/3/21.
 */
window.onload=function(){
    // // 创建歌曲库
    let songKu=[
        {id:'song1',icon:'img/x1.jpg',img:'img/b1.jpg',name:'深夜书店',author:'彭肖淇',zj:'彭肖淇精选',src:'img/深夜书店.MP3'},
        {id:'song2',icon:'img/x2.jpg',img:'img/b2.jpg',name:'爱上你的全世界',author:'彭肖淇',zj:'彭肖淇精选',src:'img/爱上你的全世界.MP3'},
        {id:'song3',icon:'img/x3.jpg',img:'img/b3.jpg',name:'遇见你',author:'彭肖淇',zj:'彭肖淇精选',src:'img/遇见你.MP3'},
        {id:'song4',icon:'img/x4.jpg',img:'img/b4.jpg',name:'闺蜜城堡',author:'彭肖淇',zj:'彭肖淇精选',src:'img/闺蜜城堡.MP3'},
        {id:'song5',icon:'img/x5.jpg',img:'img/b5.jpg',name:'高尚',author:'彭肖淇',zj:'彭肖淇精选',src:'img/高尚.MP3'}
    ];
    let ul=document.querySelector('.top ul:nth-of-type(2)');
    songKu.forEach(function (val) {
       let li=document.createElement('li');
       li.innerHTML=`
                <span class="iconfont"></span>
                <span>${val.name}</span>
                <span>${val.author}</span>
                <span>${val.zj}</span>
                <span class="iconfont">&#xe600;</span>`;
        ul.appendChild(li)
    });

    let audio=document.querySelector('audio');
    let load=document.querySelector('.load')

    audio.oncanplay=load.style.width='100%'

    let play=document.querySelector('.play')
    let current=0; //标记当前第几首
    play.onclick=function () {
        if (audio.paused){
            audio.play();
            this.innerHTML=`&#xe609;`
        }else{
            this.innerHTML=`&#xe628;`
            audio.pause();
        }
    };
    let circle=document.querySelector('.jindubox .circle');
    let played=document.querySelector('.played');

    let time=document.querySelectorAll('.time span');

    // time.innerHTML=`m+':'+n`
    audio.ontimeupdate=function () {
        let newtime=getTime(audio.currentTime);
        let totletime=getTime(audio.duration);
        time[0].innerHTML=newtime;
        time[2].innerHTML=totletime;
        circle.style.left=audio.currentTime/audio.duration*jindu.offsetWidth-10+'px';
        played.style.width=audio.currentTime/audio.duration*jindu.offsetWidth+'px';
    };
    //让进度可以点击出现在当前位置
    // audio.oncanplaythrough=function () {//无缓冲播放就可以点击
    let jindu=document.querySelector('.jindu');
        jindu.onclick=function (e) {
        circle.style.left=e.offsetX+'px';
        audio.currentTime=e.offsetX/jindu.offsetWidth*audio.duration;
    };

    // }
    function getTime(time) {
        let m=Math.trunc(time/60)>=10? Math.trunc(time/60):
            '0'+Math.trunc(time/60);
        let n=Math.trunc(time%60)>=10? Math.trunc(time%60):
            '0'+Math.trunc(time/60);
        return m+':'+n
    }
    // 点击音量切换静音非静音
    let vjindu=document.querySelector('.rel .jindu');
    let vcircle=document.querySelector('.rel .circle');
    let volume=document.querySelector('.laba');
    let valumecurrent=1;
    vcircle.style.left=vjindu.offsetWidth+'px';
    let vplayed=document.querySelector('.rel .played');
    volume.onclick=function () {

        if(audio.volume){
            valumecurrent=audio.volume;
            audio.volume=0;
            this.innerHTML=`&#xe621;`;//icaon类名
        }else{
            this.innerHTML=`&#xe654;`;
            audio.volume=valumecurrent
        }

    };

    vjindu.onclick=function (e) {
        vcircle.style.left=e.offsetX+'px';
        vplayed.style.width=audio.volume*vjindu.offsetWidth+'px';
        audio.volume=e.offsetX/vjindu.offsetWidth
    } ;
    audio.volumechange=function (e) {
        vcircle.style.left=e.offsetX+'px';
        vplayed.style.width=audio.volume*vjindu.offsetWidth+'px';
        console.log(audio.volume*vjindu.offsetWidth+'px')
    };
    let music=document.querySelector('.music')
    let author=document.querySelector('.author span');
    let icon=document.querySelector('.icon');
    music.style.backgroundImage = `url(${songKu[0].img})`;

    [...ul.children].forEach(function (val,index,arr) {
        val.ondblclick = function () {
            arr.forEach(function (val) {
                val.classList.remove('active');
                val.children[0].innerHTML ='';
            });
            val.classList.add('active');
            val.children[0].innerHTML = `&#xe649;`;
            play.innerHTML = `&#xe609;`;
            author.innerHTML = `${songKu[index].name} -- ${songKu[index].author}`;
            music.style.background = `url(${songKu[index].img})`;
            icon.style.background = `url(${songKu[index].icon})`;
            music.style.backgroundSize = '100%';
            icon.style.backgroundSize = '100%';
            icon.style.backgroundSize='cover';
            current = index;
            audio.src = songKu[current].src;
            audio.play();
            }

    });

    //点击左右切换歌曲
    let left=document.querySelector('.left');
    let right=document.querySelector('.right');
    left.onclick=function(){
        current--;
        if (current<0){
            current=songKu.length-1;
        }
        audio.src = songKu[current].src;
        author.innerHTML = `${songKu[current].name} -- ${songKu[current].author}`;
        music.style.background = `url(${songKu[current].img})`;
        icon.style.background = `url(${songKu[current].icon})`;
        music.style.backgroundSize = '100%';
        icon.style.backgroundSize = '100%';
        icon.style.backgroundSize='cover';
        play.innerHTML = `&#xe609;`;
        [...ul.children].forEach(function (val) {
            val.classList.remove('active');
            val.children[0].innerHTML ='';
        });
        ul.children[current].classList.add('active');
        ul.children[current].children[0].innerHTML = `&#xe649;`;
        audio.play();
    }
    right.onclick=function(){
        current++;
        if (current>songKu.length-1){
            current=0
        }
        audio.src = songKu[current].src;
        author.innerHTML = `${songKu[current].name} -- ${songKu[current].author}`;
        music.style.background = `url(${songKu[current].img})`;
        icon.style.background = `url(${songKu[current].icon})`;
        music.style.backgroundSize = '100%';
        icon.style.backgroundSize = '100%';
        icon.style.backgroundSize='cover';
        play.innerHTML = `&#xe609;`;
        [...ul.children].forEach(function (val) {
            val.classList.remove('active');
            val.children[0].innerHTML ='';
        });
        ul.children[current].classList.add('active');
        ul.children[current].children[0].innerHTML = `&#xe649;`;
        audio.play();
    }
};