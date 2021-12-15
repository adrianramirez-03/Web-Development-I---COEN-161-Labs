<!-- Adrian Ramirez
COEN 60 Lab 4 - PHP Search Engine -->

<!DOCTYPE html>
<html>
<head>
  <title>Search Query</title>
</head>

<body>
  <h2>Search Engine</h2>

  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
    <input type="text" name="query" value="<?php if (!empty($_GET["query"])){echo $_GET["query"];} ?>"/>
    <input type="submit" name="submit" value="Submit"/>
  </form>


  <?php
    $time = microtime(true);
    if(!empty($_GET["query"])){
      $query = $_GET["query"];
      $count = 0;
      $results = array();
      $snippet = array();

      //This gets each file that matches the Query
      foreach (glob("doc/*.txt") as $files){
        $textInFile = file_get_contents($files); //gets contents of files and assigns them to textInFile
        $snippetText = strpos(strtolower($textInFile), $query); //find occurence of the given Query

        if($snippetText !== false){
          $results[$count] = $files;
          if ($snippetText!==false){
            $snippet[$count] = substr($textInFile, $snippetText, 25);
          }
          $count++;
        }
      }

      $totalExecutionTime = microtime(true) - $time;
      //echos outs total count of results found and total time
      echo "<p>A total of $count results found in $totalExecutionTime seconds</p>";

      //echo list of matching files with Query
      for($i = 0; $i < $count; $i++){
        $fileName = basename($results[$i]);
        echo "<ul>";
          echo "<li><a href=\"".$results[$i]."\">$fileName</a>";
          echo "<ul>";
            echo "<li>".$snippet[$i]."...";             //snippet of doc
          echo "</ul>";
        echo "</ul>";
      }

    }
?>

</body>
</html>
