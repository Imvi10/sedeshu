<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Articles</title>


    <style>
        /*Copia el código y en esta sección escribe tu solución*/

        body article {
            width: 100% !important;
        }

        article {
            width: 50% !important;
            height: 50% !important;
            position: absolute;
        }

        article:nth-child(1) {
            background-color: red;
            left: 0!important;
            top: 0!important;
        }

        article:nth-child(2) {
            background-color: yellow;
            right: 0 !important;
            top: 0!important;
            left: 50%;
        }

        article:nth-child(3) {
            background-color: blue;
            left: 0;
            bottom: 0 !important;

        }

        article:nth-child(4) {
            background-color: green;
            right: 0;
            bottom: 0!important;
            left: 50%;
        }

    </style>
</head>

<body>

    <article>First</article>
    <article>Second</article>
    <article>Third</article>
    <article>Fourth</article>
</body>

</html>
