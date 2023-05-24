<?php

declare(strict_types=1);

namespace IM\Fabric\Plugin\TagCloud\Test;

use IM\Fabric\Package\HeadlessApiContracts\FilterConstants;
use IM\Fabric\Package\Plugin\WordPressPlugin;
use IM\Fabric\Plugin\TagCloud\Action\ACF\RegisterLayoutComponent;
use IM\Fabric\Plugin\TagCloud\Action\RegisterWidget;
use IM\Fabric\Plugin\TagCloud\Filter\Admin\Settings\TagCloudWidgetSettings;
use IM\Fabric\Plugin\TagCloud\TagCloudPlugin;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use IM\Fabric\Package\WordPress\WordPress;
use Mockery;

class TagCloudPluginTest extends MockeryTestCase
{
    private const EXPECTED_ACTIONS = [
        ['widgets_init', RegisterWidget::class],
        ['wp_loaded', RegisterLayoutComponent::class]
    ];
    private const EXPECTED_FILTERS = [
        [FilterConstants::SETTINGS_WIDGET_DATA_TRANSFORMATION_FILTER, TagCloudWidgetSettings::class]
    ];

    private WordPress $wordPress;
    private TagCloudPlugin $plugin;

    public function setUp(): void
    {
        $this->wordPress = Mockery::mock(WordPress::class);
        $this->plugin = Mockery::mock(TagCloudPlugin::class)->makePartial();
        $this->plugin->allows('get')->with(WordPress::class)->andReturn($this->wordPress);
        $this->plugin->__construct();
    }

    public function testInstanceOfWordPressPlugin(): void
    {
        $this->assertInstanceOf(WordPressPlugin::class, $this->plugin);
    }

    public function testRunAddsExpectedActionsAndFilters(): void
    {
        foreach (self::EXPECTED_ACTIONS as $action) {
            $this->wordPress->expects('addAction')->with(...$action);
        }

        foreach (self::EXPECTED_FILTERS as $filter) {
            $this->wordPress->expects('addFilter')->with(...$filter);
        }

        $this->plugin->run();
    }
}
