document.addEventListener("DOMContentLoaded", function(event) {
   
   

   


     /*
    ________________________ESTHETIQUE___________________________________
      */
    let overView = document.querySelector('main section.fullDisplay > section');
    let logo = document.getElementById("logo");
    let nav = document.querySelector("header > nav ")
    let header = document.querySelector("header");
    let afterH2 =document.querySelectorAll('.overView article h2::after');
    /* SCROLL & CLIC HEADER */

    console.log(afterH2);

    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50)
        {
            logo.classList.add("logoScrolled");

            logo.addEventListener("transitionend", function(event) {
                overView.classList.remove('noOpacity');
                nav.classList.remove('noOpacity');
                document.documentElement.scrollTop = 0;
                header.classList.remove('jsFixed');
            }, false);
        }

      } 

      
      logo.addEventListener('click',function(){



        logo.classList.add("logoScrolled");

        
        logo.addEventListener("transitionend", function(event) {
            overView.classList.remove('noOpacity');
            nav.classList.remove('noOpacity');
            document.documentElement.scrollTop = 0;
            header.classList.remove('jsFixed');
    }, false);
    }); 
    
    function h2Bars(){
        afterH2.forEach(titre => {
            
        });
    }
     
    /******************************************************************
    *                       PROGRAMME
    ******************************************************************/



    console.log(overView);
    window.onscroll = function() {scrollFunction()};
   
   
   
   /* SLIDER */

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    console.log("DOM fully loaded and parsed");
  /*ferment DOMcontentLoaded */ });