<?php
    $data = $_POST;
    if
    (
        empty($data['fname']) ||
        empty($data['lname']) ||
        empty($data['email']) ||
        empty($data['password']) ||
        empty($data['repassword']))
        {
            die('please fill all required fields');
        }
        if($data['password'] !== $data['repassword'])
        {
            die('Password and confirm password not match');
        }
      


$sql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(20) NOT NULL,
      `fname` varchar(30) NOT NULL,
      `lname` varchar(30) NOT NULL,
      `email` varchar(225) PRIMARY KEY,
      `password` varchar(225) NOT NULL,
      `image` varchar(225) NOT NULL DEFAULT 'profile.jpg',
    `joindate` varchar(225) NOT NULL );";

   
?>



<!-- //    if(isset($_POST['register']))
//   {
//   	//getting the post values
//     $fname=$_POST['fname'];
//     $lname=$_POST['lname'];
//     $email=$_POST['email'];
//     $password=$_POST['password'];
//    $repassword=$_POST['repassword'];
    
//    if($pass)
//   // Query for data insertion
//      $query=mysqli_query($con, "insert into tblusers(fname , lname, email, password) VALUES 
//      ('$fname','$lname', '$email', '$password' )");
//     if ($query) {
//     echo "<script>alert('You have successfully inserted the data');</script>";
//     echo "<script > document.location ='index.php'; </script>";
//   }
//   else
//     {
//       echo "<script>alert('Something Went Wrong. Please try again');</script>";
//     }
// } -->
 
