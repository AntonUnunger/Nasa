var Index = 1;
window.addEventListener("load", function(event) 
{
    showSlide();
});

function showSlide()
{
    var i;
    var slides = document.getElementsByClassName("SlideShow");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    Index++;
    if (Index > slides.length) {Index = 1} 
    slides[Index-1].style.display = "block"; 
    setTimeout(showSlide, 15000);
}