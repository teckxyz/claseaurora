<!DOCTYPE html>
<html>

<head>
    <title>Upload Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
        }
        
        h1 {
            color: #333;
        }
        
        .success {
            color: green;
        }
        
        .error {
            color: red;
        }

        .footer-text {
            margin-top: 8px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }

        .discord-logo {
            display: block;
            width: 300px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $target_dir = "uploads/";
        $uploaded_files = array();
        $upload_success = true;

        if (!empty($_FILES['uploadedfile']['name'][0])) {
            $file_count = count($_FILES['uploadedfile']['name']);
            
            for ($i = 0; $i < $file_count; $i++) {
                $target_file = $target_dir . basename($_FILES['uploadedfile']['name'][$i]);
                
                if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'][$i], $target_file)) {
                    $uploaded_files[] = basename($_FILES['uploadedfile']['name'][$i]);
                } else {
                    $upload_success = false;
                }
            }
        } else {
            $upload_success = false;
        }
        
        if ($upload_success) {
            if (!empty($uploaded_files)) {
                echo "<h1 class='success'>Se han cargado los siguientes archivos:</h1>";
                echo "<ul>";
                foreach ($uploaded_files as $file) {
                    echo "<li>$file</li>";
                }
                echo "</ul>";
            } else {
                echo "<h1 class='error'>No se ha cargado ningún archivo.</h1>";
            }
            
            // Redireccionar con JavaScript después de 3 segundos
            echo '<script>
                      setTimeout(function() {
                          window.location.href = "https://claseaurora2024.com";
                      }, 3000);
                  </script>';
        } else {
            echo "<h1 class='error'>Se ha producido un error al cargar los archivos, inténtelo de nuevo.</h1>";
        }
        ?>
        <p class="footer-text">
            © 2023 Developed and Designed by
        </p>
        <img class="discord-logo" src="https://discord.c99.nl/widget/theme-5/921925641182535681.png" alt="Discord Logo">
    </div>
</body>

</html>
