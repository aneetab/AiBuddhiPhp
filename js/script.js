mybutton=document.getElementById("myBtn");
mydiv=document.getElementById("scrolldiv");
window.onscroll=function(){scrollFunction()};
function scrollFunction()
{
    if(document.body.scrollTop>50||document.documentElement.scrollTop>50){
        mybutton.style.display="block";
        mydiv.style.display="block";

    }else
    {
        mydiv.style.display="none";
        mybutton.style.display="none";
    }
}
function topFunction(){
    document.body.scrollTop=0;
    document.documentElement.scrollTop=0;
}




