<?php include './header.php';?>

<!-- blogs section start -->
<div class="container ">
   <div class="blogcontent">
      <h3>Automation</h3>
      <p id="demo"></p>
      <img class="blogimage img-fluid animated img-thumbnail"  src="./images/analyticblog.jpeg" alt="Responsive image">
      <p>Automation is a term for technology applications where human input is minimized. This includes business process automation (BPA), 
         IT automation, personal applications such as home automation and more. Human intervention is reduced by 
         predetermining decision criteria, subprocess relationships, and related actions — and embodying those predeterminations in machines.
         Automation, includes the use of various control systems for operating equipment such as machinery, processes in factories, boilers, 
         and heat-treating ovens, switching on telephone networks, steering, and stabilization of ships, aircraft, and other applications 
         and vehicles with reduced human intervention.            
         Automation covers applications ranging from a household thermostat controlling a boiler, to a large industrial control system with tens of thousands of input measurements and output control signals. Automation has also found space in the banking sector. In control complexity, it can range from simple on-off control to multi-variable high-level algorithms.
      </p>
   </div>
   <!-- blogs content END -->
   <div class="blogcommentsection">
      <form action="">
         <p><b><i>Please provide Your valuable Comments - </i></b></p>
         <textarea class="blogcommentbox" id="comments" name=""></textarea>
  
         <button type="submit" class="btn btn-primary"  onclick="thankyou()" value="Submit">SUBMIT</button>
      </span>
      </form>
   </div>
</div>

<main id="main">
</main>
<!-- End #main -->
<div style="margin-top:50px;">
</div>
<script>
   function thankyou()
   {
       document.getElementById("ty").innerHTML = "Thank You for your Valuable comment";
   }
   
   var x = window.location.href;
   
   document.getElementById("demo").innerHTML = "The full URL of this page is:<br>" + x;
   //document.write(x)
</script>       

<?php include './footer.php';?>