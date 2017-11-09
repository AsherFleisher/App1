<?php
    class action
    {
        function go() 
        {
            require_once "DAL.php";
            $stmt = $pdo->query("SELECT * FROM model_steps;");
            foreach ($stmt as $row)
            {     
                if($_COOKIE["pagecookie"] == $row["step_id"] )
                {  
                    echo "<span id='info'><img src='images/info.png' height='42px' width='42px'><h5>" . $row['texti'] . $row['filename'] . "</h5></span>" ."<span id='stepNumberSpan'>" . $row['step_id'] . "</span><br/>";  
                    echo "<script >var image=('./images/' . {$row['filename']}); var is3d={$row['is3D']}; var viewAngle={$row['viewAngle']};</script>";
                }
            }
        }        
    }
?>
