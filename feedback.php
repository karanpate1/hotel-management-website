<?php
include('header.php');
include('dbcon.php');

$name = $nameE = $feedback = $feedbackE = "";

?>

<section id="feedback">

</section>

<section id="feedback-form">
    <form action="feedback.php" method="post">
       <input type="text" name="name" placeholder="Enter Name" value="<?php echo $name; ?>">
       <span style="color:red;"><?php echo $nameE; ?></span>
       <input type="text" name="feedback" placeholder="Enter Feedback">
       <input type="submit" name="submit">
    </form>
    <?php
       if(isset($_POST['submit']))
       {
           $feedback = $_POST['feedback'];
           if(empty($_POST['name'])){
             $nameE = "Name is required";
           }
           else{
            $name = $_POST['name'];
            if(!preg_match("/^[a-zA-Z]*$/", $name)){
                $nameE = "Only alphabets required";
            }
        }
        
           if(empty($nameE)) { 
               $qry = "INSERT INTO `feedback`(`id`, `name`, `feedback`) VALUES ('','$name','$feedback')";
               $run = mysqli_query($sql, $qry);
               if($run == true)
               {
                   ?>
                   <script>
                       alert("Feedback Saved Perfectly");
                   </script>
                   <?php
               } else {
                   ?>
                   <script>
                       alert("Error occurred while saving feedback");
                   </script>
                   <?php
               }
           } else { 
               ?>
               <script>
                   alert("<?php echo $nameE; ?>");
               </script>
               <?php
           }
       }
    ?>
</section>

<?php
include('headfooter.php');
?>

</body>
</html>
