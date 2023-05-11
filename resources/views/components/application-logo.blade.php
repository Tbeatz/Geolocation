<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        h1 {
            color: hsl(0, 0%, 86%);
            font-family: Brush Script MT;
            letter-spacing: 2px;
            cursor: pointer;
        }

        h1 span {
            transition: 0.5s ease-out;
        }
        h1:hover span:nth-child(1) {

        }
        h1:hover span:nth-child(2) {

        }
        h1:hover span {
            color: #fff;
            text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 40px #fff;
        }
    </style>
</head>
<body>
    <h1 class="text-3xl font-semibold "><span>Geolocation</span></h1>
</body>
</html>
