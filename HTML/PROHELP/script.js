let hidetext_btn= document.getElementById('hidetext_btn');
let hidetext=document.getElementById ('hidetext');

hidetext_btn.addEventListener('click', ToggleText);
function ToggleText() {
    hidetext.classList.toggle('despliege');
}


const logo=document.getElementById('logdis')
const animation=logo.animate([
    { 
        transform: 'rotateY(0)'
    },
    {
        transform: 'rotateY(360deg)' 
    }
],{
duration:2000,
direction:'normal',
easing:'lineal',
iterations:Infinity
})

