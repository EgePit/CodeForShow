<?php
namespace Core;

class View
{
    public function render($template, $data=array(), $show=true)
    {
        extract($data);

        if(!$show) {
            ob_start();
        }

        try {
            $template = $this->locateView($template);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        include($template);

        if(!$show) {
            $page = ob_get_contents();
            ob_clean();
            return $page;
        }
    }

    protected function locateView(string $template)
    {
        if(file_exists(FRONT_PATH.$template)) {
            return FRONT_PATH . $template;
        } else if(file_exists(FRONT_PATH . $template.'.php')){
            return FRONT_PATH . $template.'.php';
        }

        throw new \Exception('View can\'t be located');
    }
}