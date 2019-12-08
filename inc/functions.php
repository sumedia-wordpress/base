<?php

namespace Suma;

const DS = DIRECTORY_SEPARATOR;

function ds($path)
{
    return str_replace('/', DS, $path);
}