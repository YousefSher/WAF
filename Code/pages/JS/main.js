const headerEL = query.Selector('.header') ;
window.addEventListener('scroll', ()=>{
    if(window.scrollY > 50){
        headerEL.classlist.add('.header-scrolled');
    }
    else if(window.scrollY <= 50){
        headerEL.classlist.remove('.header-scrolled');
    }
});


