<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        p {
            margin-top: 20px;

        }

        label {
            cursor: pointer;
        }

        input[type="submit"] {
            margin: 1rem 0;
            font-weight: bold;
            padding: 1rem;
            cursor: pointer;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }

        .blue {
            color: blue;
        }

        .small {
            font-size: 12px;
        }

        .medium {
            font-size: 18px;
        }

        .large {
            font-size: 25px;
        }

        .bold {
            font-weight: bold;
        }

        .italic {
            font-style: italic;
        }
    </style>
</head>
<body>

<h1>Lorem ipsum generator</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $color = $_POST['color'];
    $size = $_POST['size'];
    $font_styles = isset($_POST['font_styles']) ? $_POST['font_styles'] : [];

    $lorem_ipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. ";

    if ($color) {
        $lorem_ipsum = '<span class="' . $color . '">' . $lorem_ipsum . '</span>';
    }
    if ($size) {
        $lorem_ipsum = '<span class="' . $size . '">' . $lorem_ipsum . '</span>';
    }
    foreach ($font_styles as $style) {
        $lorem_ipsum = '<span class="' . $style . '">' . $lorem_ipsum . '</span>';
    }

    echo "<p>" . $lorem_ipsum . "</p>";
}
?>

<form method="post">
    <div>
        <div>
            <h2>Color:</h2>
            <label><input type="radio" name="color" value="red"> Red</label><br>
            <label><input type="radio" name="color" value="green"> Green</label><br>
            <label><input type="radio" name="color" value="blue"> Blue</label><br>
        </div>
        <div>
            <h2>Size:</h2>
            <select name="size">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select><br>
        </div>
        <div>
            <h2>Font styles:</h2>
            <label><input type="checkbox" name="font_styles[]" value="bold"> Bold</label><br>
            <label><input type="checkbox" name="font_styles[]" value="italic"> Italic</label><br>
        </div>
    <div>
        <input type="submit" value="Generate Lorem Ipsum">
    </div>
</form>

</body>
</html>
