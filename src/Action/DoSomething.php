<?php

declare(strict_types=1);

namespace IM\Fabric\Plugin\TagCloud\Action;

use IM\Fabric\Package\WordPress\Action\Action;

class DoSomething extends Action
{
    public function action(...$args): void
    {
        [$condition] = $args;

        if ($condition) {
            echo 'This statement will print out, if $condition is true';
        }
    }
}
