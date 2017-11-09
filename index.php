<?php 
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <script type="text/javascript" src="CmiScripts/CmiWindowDefinition.js"></script>
<script type="text/javascript" src="CmiScripts/CmiObjectDefinitions.js"></script>
<script type="text/javascript" src="CmiScripts/CmiShaderDefinitions.js"></script>
<script type="text/javascript" src="CmiScripts/CmiHelperFunctions.js"></script>
<script type="text/javascript" src="CmiScripts/CmiShaderSources.js"></script>
<script type="text/javascript" src="CmiScripts/CmiModelDefinition.js"></script>
<script type="text/javascript" src="CmiScripts/ThirdPartyHelpers.js"></script>
<script type="text/javascript" src="scripts.js"></script>
<script src="ajax.js"></script>

  <link rel="stylesheet" href="asherlumber.css">

  </head>

  <body onload="ajax('body')">

      <div class="header"> 
            <form method="post" action="firstPage.php"><button id="home"><span id="home1" class="glyphicon glyphicon-home"></span></button></form>
      </div>
             
      <div class="section">
            
            <div class="previous" onclick="ajax('pre')"><input type="submit" name="pre" value="<" style="background-color: black;border:none"></input></div>
            <div id="d">
               
                <canvas id='CmiCanvas' style='display:none;touch-action: none;'></canvas>
                <canvas id='imageCanvas' style='display:none;touch-action: none ;'></canvas>
            
            </div>
            <div id="ajax"></div>
        
            <div class="next" onclick="ajax('next')"><input type="submit" name="next" value=">" style="background-color: black;border:none"></input>
        </div>
      </div>

      <div class="footer" id="CmiToolbar">

          <button class="buttomIcons" id="MouseMove"><image src="imgs/pan_display_icon.png" height="42px" width="42px"></button>
          <button class="buttomIcons"><img src="imgs/reset_display_icon.png" height="42px" width="42px"></button>
          <button class="buttomIcons" id="MouseRotate"><img src="imgs/rotate_icon.png" height="42px" width="42px"></button>
          <button class="buttomIcons" id="MouseZoom"><img src="imgs/zoom_icon.png" height="42px" width="42px"></button>
          
          <form method="post" action="stepsMenu.php"><button class="dropbtn glyphicon glyphicon-menu-hamburger stepsMenu"></button></form>
         
      </div>   
 </body>
</html>