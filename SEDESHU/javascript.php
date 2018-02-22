<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Javascript</title>

</head>

<body>
   

    <script type="text/javascript">
        function appendChildren(decorateDivFunction) {
            var allDivs = document.getElementsByTagName("div");
            var lengthAllDivs = allDivs.length;
            for (var i = 0; i < lengthAllDivs; i++) {
                var newDiv = document.createElement("div");
                //decorateDivFunction(newDiv);
                allDivs[i].appendChild(newDiv);
           
            }
            console.log("BUG FIXED");
        }

        // Example case. 
        document.body.innerHTML = '<div id="a"><div id="b"></div></div>';

        appendChildren(function(div) {});
        console.log(document.body.innerHTML);

    </script>
</body>
