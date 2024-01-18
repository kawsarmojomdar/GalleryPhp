<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gallary</title>
    <link rel="stylesheet" href="/src/style.css">
</head>
<body class="bg-gray-200 p-4">
    <pre>
        <?php
        if (isset($_FILES['photo'])) {
            $dirLocation = 'uploads';
            
            $allowed = ['image/jpg', 'image/png', 'image/jpeg'];
            // var_dump($allowed);
            foreach ($_FILES['photo']['tmp_name'] as $key => $tmpname) {
                $fileName = $_FILES['photo']['name'][$key];
                $type = $_FILES['photo']['type'][$key];
                $tmp_name = $_FILES['photo']['tmp_name'][$key];
                $size = $_FILES['photo']['size'][$key];
            // var_dump($fileName);
            // var_dump($fileName);
            // var_dump($type);
            // var_dump($tmp_name);
            // var_dump($size);

            if (!in_array($type, $allowed)) {
                die("This is Not  allowed");
            }
                move_uploaded_file($tmp_name, $dirLocation . '/' . $fileName);
            }

            // var_dump($dirLocation);

            
           
        }
        
        $uploads = 'uploads/';
        if (!$uploads) {
            die("NO Folder Found");
        }
        
        $openFile = opendir($uploads);
        // var_dump($openFile);

         $files = [];
         
         while ($newFile = readdir($openFile)) {
         
         $exclude = ['.', '..'];
             if (in_array( $newFile, $exclude)) {
                 continue;
             }
             // var_dump($readFile);
             $files[] = $uploads .  $newFile;

         }
        
        // var_dump($files);
        
        ?>
    </pre>
    <div class="max-w-6xl mx-auto">
        
    <div class="flex items-center justify-between mb-6">
        <div class="w-1/2 ml-6">
            <div class="flex items-center">
                <img src="/img/logo1.png" alt="">
                <h1 class="text-2xl"><strong>PHP Image gallary</strong><br> Simple image gallary</h1>
            </div>
        </div>
        <div class="w-1/2"  ><form action="#" method="post" enctype="multipart/form-data" >
        <label  class="text-lg block font-medium" for="photo">Uolod your file
        <input class="border rounded-md p-2 border-gray-300" type="file" name="photo[]" multiple>
        </label>
        <input class="bg-blue-700 p-2 rounded text-white hover:bg-green-500 " type="submit" value="Submit">
    </form></div>
    </div>
    <div>
        <h2 class="bg-gray-700 text-lg text-center text-white">Image gallary</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 border-t border-gray-300 pt-3">
    <?php foreach($files as $file): ?>
        
        <img  class="h-auto max-w-full rounded-lg" src="<?php echo $file ?>" alt="">
       
    <?php endforeach; ?>
    </div>
    </div>
    </div>
</body>
</html> 