<?php

namespace IM\Fabric\Plugin\TagCloud\Test\Filter\Admin\Settings;

use IM\Fabric\Plugin\TagCloud\DataProvider\WidgetData;
use IM\Fabric\Plugin\TagCloud\Filter\Admin\Settings\TagCloudWidgetSettings;
use PHPUnit\Framework\TestCase;
use Mockery;

class TagCloudWidgetSettingsTest extends TestCase
{
    public function testTagCloudWidgetData(): void
    {
        $expected = ['test' => 'Test'];
        $widgetData = Mockery::mock(WidgetData::class)->makePartial();
        $widgetData->shouldReceive('getOptions')->once()->andReturn($expected);

        $tagCloudWidget = new TagCloudWidgetSettings($widgetData);
        $data = $tagCloudWidget->filter([], 'im_tag_cloud_widget', '');

        $this->assertSame($expected, $data);
    }

    public function testOtherWidgetData(): void
    {
        $expected = ['test' => 'Test'];
        $widgetData = Mockery::mock(WidgetData::class)->makePartial();

        $tagCloudWidget = new TagCloudWidgetSettings($widgetData);
        $data = $tagCloudWidget->filter($expected, 'im_other_widget', '');

        $this->assertSame($expected, $data);
    }
}
