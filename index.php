<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnExtraRep</title>
    <link rel="stylesheet" href="./index.css"/>
</head>
<body>
    <nav>
        <div class="headerDiv">
            <h2>AnExtraRep</h2>
            <ul>
                <li>
                    Home
                </li>
                <li style="color:royalblue">
                    <a  href="healthReport.php">Get Health Report</a>
                </li>
                
            </ul>
        </div>
    </nav>
    <form class="form" action="index.php" enctype="multipart/form-data" method="post">
        <p class="title">Register </p>
        <p class="message">Signup now and get full access to our app. </p>
           
            <label>
                <input required="" placeholder="" type="text" class="input" name="name" >
                <span>Name</span>
            </label>
    
                 
        <label>
            <input required="" placeholder="" type="number" class="input" name="age">
            <span>Age</span>
        </label>
     
                
        <label>
            <input required="" placeholder="" type="email" class="input" name="email">
            <span>Email</span>
        </label> 
        <label>
            <input required="" placeholder="" type="number" class="input" name="weight">
            <span>Weight</span>
        </label>
        <label><span >Upload health report</span></label>
        <label>
            <input name="health" required="" placeholder="" type="file" class="input" >
        </label>
        <button name='submit' class="submit" type="submit">Submit</button>
        
    </form>




    <?php
if(isset($_POST['submit'])){
include 'Backend/db_connections.php';
$db=createCon();

function validateHealthReport(){
    
        $n= $_FILES["health"]["type"];
        $ex= strpos($n,'/');
        $org= substr($n,$ex+1);
        // echo $org;
        if($org=="pdf"){
            return true;
        }else {
           
            return false;}
   
  

}

if(validateHealthReport()){
$target_dir="Backend/healthReport/";
$target_file=$target_dir . basename($_FILES["health"]["name"]);
move_uploaded_file($_FILES["health"]["tmp_name"],$target_file);
// now insert the data into table

$name=$_POST["name"];
$email=$_POST["email"];
$age=$_POST["age"];
$weight= $_POST["weight"];

$query="insert into anextrarep values('$name','$age','$email','$weight','$target_file')";

$result= mysqli_query($db,$query);
if($result === TRUE) {
   echo "<script>alert('New record created successfully')</script><br>";
 } else {
    echo "this is me";
   echo '<script>alert("Email already exists.")</script>';
 }
}else{
    echo '<script>alert("Invalid document format")</script>'; 
}
}
?>
</body>
</html>