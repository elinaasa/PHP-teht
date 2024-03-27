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
        div {
            padding: 1rem 0 0.5rem 0;
        }
        label {
            font-weight: bold;
            
        }
        input[type="radio"], input[type="checkbox"] {
            margin-right: 5px;
            cursor: pointer;
        }
        input[type="submit"] {
            margin-top: 10px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f3f3f3;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #e9e9e9;
        }
        p {
            margin-top: 20px;
        }
        .red { color: red; }
        .green { color: green; }
        .blue { color: blue; }
        .small { font-size: 12px; }
        .medium { font-size: 18px; }
        .large { font-size: 25px; }
        .bold { font-weight: bold; }
        .italic { font-style: italic; }
    </style>
</head>
<body>

<h1>Lorem ipsum generator</h1>

<?php
// Process form data
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
        <label>Color:</label><br>
        <input type="radio" name="color" value="red"> Red<br>
        <input type="radio" name="color" value="green"> Green<br>
        <input type="radio" name="color" value="blue"> Blue<br>
    </div>
    <div>
        <label>Size:</label><br>
        <select name="size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select><br>
    </div>
    <div>
        <label>Font style:</label><br>
        <input type="checkbox" name="font_styles[]" value="bold"> Bold<br>
        <input type="checkbox" name="font_styles[]" value="italic"> Italic<br>
    </div>
    <div>
        <input type="submit" value="Generate Lorem Ipsum">
    </div>
</form>

</body>
</html>