<?php

namespace IM\Fabric\Plugin\TagCloud\Action;

use IM\Fabric\Package\WordPress\Action\Action;
use IM\Fabric\Plugin\TagCloud\Widget\TagCloudWidget;

class RegisterWidget extends Action
{
    private TagCloudWidget $widget;

    public function __construct(TagCloudWidget $widget)
    {
        $this->widget = $widget;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function action(...$args)
    {
        register_widget($this->widget);
    }
}
