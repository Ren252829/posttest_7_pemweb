// darkmode and ligthmode toggle
var icon = document.getElementById('ikon');

icon.onclick = function(){
    document.body.classList.toggle('lighttheme');
    if(document.body.classList.contains('lighttheme')){
        ikon.src ='assets/moon.png';
    }else{
        ikon.src = 'assets/sun1.png';
    }
}

//popup alert
alert('Selamat Datang Di RMT Media');


//addEventListener Menu on mobile
const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('.nav-items ul');
menuToggle.addEventListener('click', function() {
    nav.classList.toggle('slide');
})

//manipulasi style
const bio = document.querySelector('.bio-box');
bio.style.color = 'white';

const footer = document.querySelector('footer');
footer.style.backgroundColor = '#2c2c33';

