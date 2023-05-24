<?php

namespace IM\Fabric\Plugin\TagCloud\Test\DataProvider;

use IM\Fabric\Plugin\TagCloud\DataProvider\WidgetData;
use PHPUnit\Framework\TestCase;
use WP_Mock;

class WidgetDataTest extends TestCase
{
    public function testGetOptions()
    {
        WP_Mock::userFunction('get_option', [
            'args' => ['widget_1_acf_im_tag_cloud_widget-taxonomy-groups', []],
            'times' => 1,
            'return' => ['tags']
        ]);

        $widgetData = new WidgetData();
        $options = $widgetData->getOptions(1);
        $this->assertSame(['taxonomies' => ['tags']], $options);
    }
}
