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
        
        var vid = slides[i].getElementsByClassName("slidervid")[0];
        if (vid)
        {
            vid.pause();
        }
        
    }
    Index++;
    if (Index > slides.length) {Index = 1} 
    slides[Index-1].style.display = "block"; 
    
    var playVid = slides[Index-1].getElementsByClassName("slidervid")[0];
    if (playVid)
    {
        playVid.play();
    }
   
    setTimeout(showSlide, 5000);
}