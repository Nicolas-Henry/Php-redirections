<?php
    echo "Redirections<br />";
    $url = $_SERVER['REQUEST_URI'];
    
    echo "<br />";
    echo "Url : ".$url;
    echo "<br />";
    
    // array of redirections
    // $key = source / $value = destination
    $urlCorrespondences = array(); 
    
    // example = you can modify and add your redirections here
    $urlCorrespondences['/directory/index.php'] = "/index.php";
    $urlCorrespondences['/file.php'] = "/file2.php";
    // ...
    
     // test if current url is in $urlCorrespondences array
    foreach ($urlCorrespondences as $key=>$value) {
        echo "<br />";
        echo "Key : ".$key."<br />";
        echo "Value : ".$value."<br />";
        $position = strpos($url, $key);
        if ($position === false) {
            // Not found
        } else {
            // found !!! = do redirection to new url
            header("Status: 301 Moved Permanently", false, 301);
            header("Location: $value");
            exit();
        }            
    } // end foreach
?>
