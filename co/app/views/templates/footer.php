    <?php 
    
    Bracked::footer();
    
    ?>
<script src="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.bundle.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo BASEURL; ?>assets/icons/js/all.js" type="text/javascript" charset="utf-8"></script>
<script>
var countDownDate = new Date("Dec 29, 2024 00:00:00").getTime();
var x = setInterval(function() {

  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s " + " <span style='color:yellow;'>Maintances Launch</span>";
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Launching...";
  }
}, 1000);
</script>
</body>
</html>