<?php
session_start();
require_once "classMain.php";
if(isset($_COOKIE["pagecookie"]))
{
    $_SESSION["currentStep"] = $_COOKIE["pagecookie"];
}
//if page not set. set current page to 1
if(empty($_SESSION["currentStep"]))
{
    $_SESSION["currentStep"] = 1;
}

$page = $_POST["page"];

switch ($page)
{
    case "body":
    //take me back to where i was when i closed the app
    if(isset($_COOKIE["pagecookie"]))
    {
        $_SESSION["currentStep"] = $_COOKIE["pagecookie"];
        $a = new action;
        $a->go();
    }
    else
    {
        $a = new action;
        $a->go();
    }
    break;

    case "next":
    $_SESSION["currentStep"]++;
    setcookie("pagecookie", $_SESSION["currentStep"], time()+3600*24*30);    
    $a = new action;
    $a->go();
    break;

    case "pre":
    $_SESSION["currentStep"]--;
    setcookie("pagecookie", $_SESSION["currentStep"], time()+3600*24*30);
    $a = new action;
    $a->go();
    break;
}
        //     //if choseמ a page from the stepMenu page go to it
        //     if(isset($_POST["goTo"]))
        //     {
        //         $_SESSION["currentStep"] = $_POST["goTo"];
        //         setcookie("pagecookie", $_SESSION["currentStep"], time()+3600*24*30);// add this in when live: , "/", "lumbergo.com"
        //         unset($_POST["goTo"]);
        //     }


      ?>