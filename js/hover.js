
function FadeIn()
{
    document.getElementById('news-info1').style.opacity = (parseFloat(document.getElementById('news-info1').style.opacity) + 0.1);
    if (document.getElementById('news-info1').style.opacity < 1) {
        setTimeout(FadeIn, 50);
    }
    else{document.getElementById("news-info1").style.opacity = "1";}
}
function FadeOut()
{
    document.getElementById('news-info1').style.opacity = (parseFloat(document.getElementById('news-info1').style.opacity) - 0.1);
    if (document.getElementById('news-info1').style.opacity > 0) {
        setTimeout(FadeOut, 50);
    }else{
    document.getElementById("news-info1").style.display = "none";
    }
}
function MyLeave()
{ 
    if (document.getElementById('news-info1').style.opacity < 1) {
        setTimeout(MyLeave, 100);
    }
    else
    {
        setTimeout(FadeOut, 50);
    }
}
function MyHover()
{
    if (document.getElementById('news-info1').style.opacity > 0) {
        setTimeout(MyHover, 100);
    }
    else
    {
        document.getElementById("news-info1").style.opacity = "0";
        document.getElementById("news-info1").style.display = "block";
        setTimeout(FadeIn, 50);
    }  
}