<html>
    <head>
        <title>Crowdsourcing Researcher Dashboard</title>

        <style>


h1 {
    color: white;
    text-align: center;
    font-size: 270%;
}


h2 {
    color: white;
    text-align: center;
    font-size: 230%;
}
p {
    color: white;
    text-align: center;
    font-size: 170%;
}
form{
    color: white;
    text-align: center;
    font-size: 170%;
}
input[type=text] {
    width: 40%;
    padding: 5px 5px;
    margin: 5px 0;
    box-sizing: border-box;
    font-size: 100%;
}
input[type=submit] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 22px;
    margin: 4px 4px;
    cursor: pointer;
}
input[type=button] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 14px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 24px;
    margin: 4px 4px;
    cursor: pointer;
}
input[type=file] {
    background-color: white;
    border: none;
    color: black;
    padding: 12px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
}
::-webkit-file-upload-button {
    background: #4CAF50;
    color: white;
    font-size: 18px;
    padding: 8px;
}
body {
    background-color: black;
}

</style>
    </head>
    <body>
        <h1>Crowdsourcing Researcher Dashboard</h1>

        <h2>Study:
        <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "cjjawl";
                $dbname = "backcap";
                    
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rowNumber=0;
            
                    $study_id=$_GET["study_id"];

                    $stmt=$conn->query("SELECT name FROM backcap.study Where id = " .$study_id); 
                    foreach($stmt as $row){
        
                        $rowNumber=$rowNumber+1;
                        $name= $row['name'];
                        echo $name;
                    }
                }
                catch(PDOException $e)
                {
                    echo "Error: " . $e->getMessage();
                }   
                $conn = null;
                echo "</h2>";
        ?>   
        


        <h2>Question Responses:
        <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "cjjawl";
                $dbname = "backcap";
                    
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rowNumber=0;
            
                    $question_id=$_GET["question_id"];

                    $stmt=$conn->query("SELECT text FROM backcap.questions Where id = " .$question_id); 
                    foreach($stmt as $row){
        
                        $rowNumber=$rowNumber+1;
                        $name= $row['text'];
                        echo $question_id. ". ".$name;
                    }
                }
                catch(PDOException $e)
                {
                    echo "Error: " . $e->getMessage();
                }   
                $conn = null;
                echo "</h2>";
        ?>   


        <?php

                $optionsArray = array();
                $option_number=0;

                $servername = "127.0.0.1";
                $username = "root";
                $password = "cjjawl";
                $dbname = "backcap";
                //options
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rowNumber=0;
            
                    $question_id=$_GET["question_id"];

                    $stmt=$conn->query("SELECT id,name FROM backcap.options"); 
                    foreach($stmt as $row){
                        $option_number=$option_number+1;
                        $optionsArray[$option_number] = $row['name'];
                    }
                }
                catch(PDOException $e)
                {
                    echo "Error: " . $e->getMessage();
                }   
                $conn = null;

                //responses
                $response_number = array();
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rowNumber=0;
            
                    $question_id=$_GET["question_id"];

                    $stmt=$conn->query("SELECT option_id FROM backcap.answers Where question_id = " .$question_id. ""); 
                    $response_number[1]=0;
                    $response_number[2]=0;
                    $response_number[3]=0;
                    $response_number[4]=0;
                    $response_number[5]=0;

                    foreach($stmt as $row){
        
                        $rowNumber=$rowNumber+1;
                        $name= $row['option_id'];
                        $response_number[$name]=$response_number[$name]+1;

                        //count reponses from all devices
                       
                    }
                    echo "<h2>Response count</h2>";
                    echo "<p>".$optionsArray[1]. ": ".$response_number[1]. "</p>";
                    echo "<p>".$optionsArray[2]. ": ".$response_number[2]. "</p>";
                    echo "<p>".$optionsArray[3]. ": ".$response_number[3]. "</p>";
                    echo "<p>".$optionsArray[4]. ": ".$response_number[4]. "</p>";
                    echo "<p>".$optionsArray[5]. ": ".$response_number[5]. "</p>";

                }
                catch(PDOException $e)
                {
                    echo "Error: " . $e->getMessage();
                }   
                $conn = null;
        ?>   
       
<?php

                $optionsArray = array();
                $option_number=0;

                $servername = "127.0.0.1";
                $username = "root";
                $password = "cjjawl";
                $dbname = "backcap";
                //options
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rowNumber=0;
            
                    $question_id=$_GET["question_id"];

                    $stmt=$conn->query("SELECT id,name FROM backcap.options"); 
                    foreach($stmt as $row){
                        $option_number=$option_number+1;
                        $optionsArray[$option_number] = $row['name'];
                    }
                }
                catch(PDOException $e)
                {
                    echo "Error: " . $e->getMessage();
                }   
                $conn = null;

                //responses
                $response_number = array();
                $lastDevice="";
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
            
                    $question_id=$_GET["question_id"];

                    $stmt=$conn->query("SELECT DISTINCT option_id, device_id FROM backcap.answers Where question_id = " .$question_id. " ORDER BY device_id ASC"); 
                    $response_number[1]=0;
                    $response_number[2]=0;
                    $response_number[3]=0;
                    $response_number[4]=0;
                    $response_number[5]=0;

                    foreach($stmt as $row){
                        if($lastDevice!=$row['device_id'])
                        {

                            $name= $row['option_id'];
                            $lastDevice=$row['device_id'];
                            $response_number[$name]=$response_number[$name]+1;

                        }

                        //count reponses from unique devices
                    }
                    echo "<h2>Response count from unique devices</h2>";
                    echo "<p>".$optionsArray[1]. ": ".$response_number[1]. "</p>";
                    echo "<p>".$optionsArray[2]. ": ".$response_number[2]. "</p>";
                    echo "<p>".$optionsArray[3]. ": ".$response_number[3]. "</p>";
                    echo "<p>".$optionsArray[4]. ": ".$response_number[4]. "</p>";
                    echo "<p>".$optionsArray[5]. ": ".$response_number[5]. "</p>";

                }
                catch(PDOException $e)
                {
                    echo "Error: " . $e->getMessage();
                }   
                $conn = null;
                $study_id=$_GET["study_id"];

                echo "<p><input type=\"button\" onclick=\"studyManage(".$study_id. ");\" value=\"Back To Study\"/></p>";
        ?>   
    </body>

    <script>
    function studyManage(parameter)
    {
        console.log("send questions number $$$$$$$$$$$$ ");
        window.location = "manage_study.php?study_id=" + parameter;
    };
</script>
</html>
