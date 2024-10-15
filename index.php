







<?php
$apikey = '$2y$10$DNfYcGLj51Zw2WoRBz5tnMDtHvrqqucI8qupU9PjBbNUroxQ6';

$response = file_get_contents("https://hadithapi.com/api/books?apiKey=$apikey");

$response = json_decode($response, true);

$hadithbooks = $response["books"];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: "jameel";
    }

    @font-face {
      font-family: "jameel";
      src: url(fonts/jameel.ttf);
    }
  </style>

</head>

<body>
  <!-- card of api -->
  <div class="container">
    <div class="row">
      <?php
      foreach ($hadithbooks as $value) {
          echo '
          <div class="col-sm-4 mb-4">
            <div class="card" style="width: 100%;">
              <img src="picture/unnamed.webp" class="card-img-top" alt="picture/unnamed.webp">
              <div class="card-body">
                <h5 class="card-title">'.$value["bookName"].'</h5>
                <p class="card-text">Writer Name | '.$value["writerName"].' | Total Hadith | '.$value["hadiths_count"].' | Hadith Chapters | '.$value["chapters_count"].'</p>
                <form action="chapter.php" method="POST">
                  <input type="hidden" name="booksluge" value="'.$value['bookSlug'].'">
                  <input type="submit" class="btn btn-primary" value="Read Chapter">
                </form>
              </div>
            </div>
          </div>';
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

