<?php

declare(strict_types=1);

namespace IM\Fabric\Plugin\TagCloud\Test;

use IM\Fabric\Package\Plugin\WordPressPlugin;
use IM\Fabric\Plugin\TagCloud\TagCloudPlugin;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class TagCloudPluginTest extends MockeryTestCase
{
    public function testInstanceOfWordPressPlugin(): void
    {
        $plugin = new TagCloudPlugin();
        $this->assertInstanceOf(WordPressPlugin::class, $plugin);
    }
}
