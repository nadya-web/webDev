window.onload=function(){
    let slides = document.querySelectorAll('.slide'), 
    	textSlides = document.querySelectorAll('.textSlide'),
        current = 0; 
    
    function slider() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.add('opacity0');
            textSlides[i].classList.add('opacity02');
            textSlides[i].style.zIndex = '-100';
        }
        slides[current].classList.remove('opacity0');
        textSlides[current].classList.remove('opacity02');
        textSlides[current].style.zIndex = '150';        
        
    }
    document.getElementById('arrowLeft').addEventListener('click', function(){
        if (current-1 == -1){
            current = slides.length-1;
        }
        else {
            current--;
        }
        slider();
    })
    document.getElementById('arrowRight').onclick = function(){
        if (current+1 == slides.length){
            current = 0;
        }
        else {
            current++;
        }
        slider();
    };


    let arrow = document.querySelectorAll('.arrow');
    let more = document.querySelectorAll('.more');

    for (let i = 0; i < arrow.length; i++){
        arrow[i].onclick = function(){
            if (more[i].classList.contains('active')){
                more[i].classList.remove('active');
                console.log('click', more[i])
            }
            else {
                more[i].classList.add('active');
            }
        };}
}