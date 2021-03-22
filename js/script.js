const responsive = {
    0: {
        items: 1
    },
    320: {
        items: 1
    },
    560: {
        items: 2
    },
    960: {
        items: 3
    }
}
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
 
$(document).ready(function(){
    // banner image change
    let bannerCount = 0;
    setInterval(function(){
        hideAllBanner();
        changeBannerCount();
        changeBanner();
    }, 8000);

    function changeBanner(){
        $('.banner-item').each(function(idx){
            if(bannerCount == idx){
                $(this).addClass('active-banner');
            }
        });
    }

    function hideAllBanner(){
        $('.banner-item').each(function(idx){
            $(this).removeClass('active-banner');
        });
    }

    function changeBannerCount(){
        bannerCount++;
        if(bannerCount >= $('.banner-item').length){
            bannerCount = 0;
        }
    }


    $('.subject_experts .owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            560: {
                items: 2
            }
        }
    })

     

}); 


