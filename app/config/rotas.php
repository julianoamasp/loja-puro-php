<?php
function rotasRetorno()
{
    $rotas = array(
        ["requisicao" => "/loja/", "metodo" => "GET", "controlador" => "home.php"],
        ["requisicao" => "/loja/(:palavra)", "metodo" => "GET", "controlador" => "home.php"]
    );
    foreach ($rotas as $rota) {
        echo "<pre>";
        $req = explode("/", $rota['requisicao']);
        $serverReq = explode("/", $_SERVER['REQUEST_URI']);
        if (count($req) == count($serverReq) && $rota['metodo'] == $_SERVER['REQUEST_METHOD']) {
            $valid = true;
            for ($i = 0; $i < count($req); $i++) {
                if($req[$i] == "(:palavra)" && $req[$i] != ""){
                    continue;
                }
                if($req[$i] != $serverReq[$i]){
                    $valid = false;
                }
                
            }
            if($valid == true){
                include("./app/controller/".$rota['controlador']);
                break;
            }else{
                header("Location: ");
            }
        }
    }
}
rotasRetorno();