<!DOCTYPE html>
<html>


<style>
.mySlides {display:none;}

</style>
<body>

<div class="StyleADV_Right_PAgeO_A" style="overflow:none; width:900; height:400; text-align:center; float:center; ">

<div class="Oocontent" style="max-width:400px">

<div class="mySlides Oocontainer Oored">
  <h1><b>Welcome To My Website</b></h1>
  <h1><i>The main idea of this an auction website Source code is available in my university</i></h1>
</div>
<div class="mySlides Oocontainer Oored">
  <h1><b>This is an open Source Code for learning purpose</b></h1>
  <h1><i><a href="View_pro.php">Project</></i></h1>
</div>
<div class="mySlides Oocontainer Ooxlarge Oowhite Oocard-8">
<a href="onlineauctionweb/about_online_auction.php"><span class="Ootag Ooyellow">For More Information About Me</span>
<img class=" " src="images/omar_auction_logo.png"  style="width:100%">


</a>
</div>
<div class="mySlides Oocontainer Ooxlarge Oowhite Oocard-8">
  <p><span class="Ootag Ooyellow">This</span>
   The Location for Adv </p>
  <p>Final Project open source code</p>
</div>

<img class="mySlides" src="images/Oamr.jpg"  style="width:100%">

</div>
</div>

<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, 2000);
}
</script>

</body>
</html>

