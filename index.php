<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $file = file_get_contents("./db.json"); // auslesen einer Datei im selben Ordner
    $data = json_decode($file, true); // parsen des String der Datei zu einem assoziativen array
    $faqs = $data["faqs"]; // das definieren einer Variable von dem Array an am Key faqs
    
    foreach($faqs as $faq) { ?>
        <div class="faq">
            <h3><?= $faq["headline"] ?></h3>
            <p><?= $faq["answer"] ?></p>
        </div>
    <?php } ?>

</body>
</html>