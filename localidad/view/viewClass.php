<?php

class viewCLass {
   /**
   * Método para mostrar el resultado final 
   * 
   * @param type $view nombre del templete a usar
   * @param type $args variable a pasar a la vista
   */

    static public function renderHTML($view, $args = NULL) {
        if (is_array($args)) {
            extract($args);
        }
        include_once 'template/' . $view;
    }

}

?>