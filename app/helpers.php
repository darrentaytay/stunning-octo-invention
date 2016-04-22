<?php

function dd($variable)
{
	var_dump($variable);
	die();
}

function view($path, $data = [])
{
    extract($data);
    
    $path = sprintf('%s/Views/%s.php', __DIR__, $path);

    ob_start();
    include($path);
    $contents = ob_get_contents();
    ob_end_clean();

    return $contents;
}