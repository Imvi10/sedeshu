<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Javascript</title>

</head>

<body>


</body>

<?php
class Thesaurus{
    
    private $thesaurus;

    function Thesaurus($thesaurus){
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms($word){
        if(array_key_exists($word , $this->thesaurus)){
            return json_encode(array("palabra:" => $word , "sinonimos" => $this->thesaurus[$word]));
        }else{
            return json_encode(array("palabra:" => $word , "sinonimos" => array()));
        }
        
    }
}

$thesaurus = new Thesaurus(
    array 
        (
            "comprar" => array("compra"),
            "grande" => array("enorme", "largo")
        )); 

echo $thesaurus->getSynonyms("grande");
echo "<br>";
echo $thesaurus->getSynonyms("mesa");
    
    ?>

</html>
