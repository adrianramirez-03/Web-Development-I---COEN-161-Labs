<!DOCTYPE HTML>
<head>
  <head>
    <title>Adrian's Photo Gallery</title>
  </head>

  <body>
    <h1>My Photo Album</h1>
    <ul>
      <?php
        $photos = glob("photo/*.jpg");

        foreach($photos as $photo){
          $sizeOfphoto = round(filesize($photo)/1024);
          $name = basename($photo);

          echo "<li><a href=\"photo/$name\"> . $name . "</a>" . "(" . $sizeOfphoto . " KB" . ")" . "</li>" . "\n"";
        }
      ?>
    </ul>
  </body>
</head>
