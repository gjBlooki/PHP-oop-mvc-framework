<?php

namespace MyProject\View;

class View
{
    private $templatesPath;

    public function __construct(string $templatesPath) 
    {
        $this->templatesPath = $templatesPath;
    }
    
    public function renderHtml(string $templatesName, array $vars = [], int $code = 200)
    {
        http_response_code($code);
        extract($vars);
        $title = $title ?? 'Мой блог';

        ob_start();
        include $this->templatesPath . '/' . $templatesName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }
}