<?php 

    function eventosJson(&$conferencias, &$tallerbasico, &$talleravanzado){
        
        $eventos_json = array();

        foreach($conferencias as $evento):
            $eventos_json['evento'][] = $conferencias;
        endforeach;
            
        $basicos = (int)$tallerbasico;
        $eventos_json['evento'] = $basicos;

        $avanzados = (int)$talleravanzado;
        $eventos_json['evento'] = $avanzados;

        return ($eventos_json);
    }