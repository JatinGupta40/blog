<?php include './header.php';?>
<!-- blogs content start -->

<div class="blog">
   <div class="container ">
      <div class="blogcontent">
         <h3>Analytics</h3>
         <img class="blogimage img-fluid animated img-thumbnail"  src="images/analyticblog.jpeg" alt="Responsive image" >
         <p>Analytics is the systematic computational analysis of data or statistics. 
            It is used for the discovery, interpretation, and communication of meaningful patterns in data. 
            It also entails applying data patterns towards effective decision-making. 
            <br>
            It can be valuable in areas rich with recorded information; analytics relies on the simultaneous application of statistics, 
            computer programming and operations research to quantify performance.
            Organizations may apply analytics to business data to describe, predict, and improve business performance. 
            Specifically, areas within analytics include predictive analytics, prescriptive analytics, enterprise decision management, 
            descriptive analytics, cognitive analytics, Big Data Analytics, retail analytics, supply chain analytics, store assortment and 
            stock-keeping unit optimization, marketing optimization and marketing mix modeling, web analytics, call analytics, speech analytics, 
            sales force sizing and optimization, price and promotion modeling, predictive science, graph analytics, credit risk analysis, and 
            fraud analytics. 
            <br>
            Since analytics can require extensive computation (see big data), the algorithms and software used for analytics harness 
            the most current methods in computer science, statistics, and mathematics.
         </p>
      </div>
      <!-- blogs content END -->
      <div class="blogcommentsection">
         <form action="">
            <p><b><i>Please provide Your valuable Comments - </i></b></p>
         <textarea class="blogcommentbox" id="comments" name=""></textarea>
                       <br>
            <button type="button" class="btn btn-primary"  onclick="thankyou()" value="Submit">SUBMIT</button>
            <i>
               <p id="ty"></p>
            </i>
         </form>
      </div>
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
   document.write(x)
</script>      
<?php include './footer.php';?>