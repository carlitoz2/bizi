document.addEventListener("DOMContentLoaded", function(event) {
   
   

   


     /*
    ________________________ESTHETIQUE___________________________________
      */
    let overView = document.querySelector('main section.fullDisplay > section');
    let logo = document.getElementById("logo");
    let nav = document.querySelector("header > nav ")
    let header = document.querySelector("header");
    var overviewH2 =document.querySelectorAll('.overView article h2');
    var spanAfterH2 = document.querySelectorAll('.overView article h2 + span');
    var afterH2 =document.querySelectorAll('.overView article h2 + span > span');
    /* SCROLL & CLIC HEADER */

    console.log(spanAfterH2);

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
    
    // function h2Bars(){
    //     afterH2.forEach(Element => {

    //     });
    // }
     
    /******************************************************************
    *                       PROGRAMME
    ******************************************************************/


    console.log(overView);
    window.onscroll = function() {scrollFunction()};
   
   
   
   /* SLIDER */

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    console.log("DOM fully loaded and parsed");
    afterH2.onmouseenter = function(){
        afterH2.classList.add('overViewTitleSpan');
        afterH2.addEventListener("transitionend", function(event) {
            if (afterH2.classList.contains('overViewTitleSpanLeave')){
             afterH2.classList.remove('overViewTitleSpanLeave');
            };
 
     }, false);
        console.log('ok0');
    };


    afterH2.onmouseleave = function(){
        afterH2.classList.add('overViewTitleSpanLeave');
        afterH2.addEventListener("transitionend", function(event) {
            if (afterH2.classList.contains('overViewTitleSpanLeave')){
             afterH2.classList.remove('overViewTitleSpanLeave');
            };
 
     }, false);
        console.log('ok1');
    };


    spanAfterH2.forEach(function(element) {
        element.onmouseenter = function(){

            afterH2.forEach(function(element){
                
                element.classList.add('overViewTitleSpan');
                element.addEventListener("transitionend", function(event) {
                if (element.classList.contains('overViewTitleSpanLeave')){
                 element.classList.remove('overViewTitleSpanLeave');
                };
     
         }, false);
            });

            element.onmouseleave = function(){

                afterH2.forEach(function(element){

                    element.classList.add('overViewTitleSpanLeave');
                    element.addEventListener("transitionend", function(event) {
                    if (element.classList.contains('overViewTitleSpanLeave')){
                        element.classList.remove('overViewTitleSpanLeave');
                    };
         
            }, false);
                });
            };
            console.log('ok0');
        };
    

      });


    overviewH2.forEach(function(element) {
        element.onmouseenter = function(){

            afterH2.forEach(function(element){
                
                element.classList.add('overViewTitleSpan');
                element.addEventListener("transitionend", function(event) {
                if (element.classList.contains('overViewTitleSpanLeave')){
                 element.classList.remove('overViewTitleSpanLeave');
                };
     
         }, false);
            });

            element.onmouseleave = function(){

                afterH2.forEach(function(element){

                    element.classList.add('overViewTitleSpanLeave');
                    element.addEventListener("transitionend", function(event) {
                    if (element.classList.contains('overViewTitleSpanLeave')){
                        element.classList.remove('overViewTitleSpanLeave');
                    };
         
            }, false);
                });
            };
            console.log('ok0');
        };
    

      });

      



  /*ferment DOMcontentLoaded */ });