
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
                <li style="color:royalblue">
                    <a href="index.php">Home</a>
                </li>
                <li >
                   Get Health Report
                </li>
                
            </ul>
        </div>
    </nav>
    <form class="form"  action="healthReport.php" enctype="multipart/form-data" method="post">
        <p class="title">Get your health report! </p>
     
                
        <label>
            <input required="" placeholder="" type="email" class="input" name="email">
            <span>Email</span>
        </label> 
        
    
        
        <button type="submit" name='submit' class="submit">Submit</button>
        <?php
if(isset($_POST{'submit'})){
    include './Backend/db_connections.php';
    $db=createCon();
    if(isset($_POST['email'])){
        $sql='select HEALTHREPORT from anextrarep where EMAIL = '.'\''.$_POST['email'].'\''.';';
        // echo $sql;
        $result=mysqli_query($db,$sql);
        if(mysqli_num_rows($result)==0){
            echo '<script>alert("No record found.")</script>';
        }
        while ($row = $result->fetch_assoc()) {
            $url=$row['HEALTHREPORT'];
            
            // echo $url;
            echo "<embed src=$url type='application/pdf'  >";
        }
    }
}

?>
 
    </form>
</body>
</html>