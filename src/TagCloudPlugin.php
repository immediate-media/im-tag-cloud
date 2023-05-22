<?php

declare(strict_types=1);

namespace IM\Fabric\Plugin\TagCloud;

use IM\Fabric\Package\Plugin\WordPressPlugin;

class TagCloudPlugin extends WordPressPlugin
{
    public const PLUGIN_ID = 'im-tag-cloud';

    /**
     * The 'run' method is the core of the plugin functionality
     * It acts as a "Controller Action" method
     */
    public function run(): void
    {
        $this->wordPress->addAction('example_wp_hook', $this->get(Action\DoSomething::class));
        $this->wordPress->addFilter('another_example_wp_hook', $this->get(Filter\ChangeSomething::class));
    }
}
