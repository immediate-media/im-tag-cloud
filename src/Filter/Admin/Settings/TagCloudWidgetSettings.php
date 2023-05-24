<?php

namespace IM\Fabric\Plugin\TagCloud\Filter\Admin\Settings;

use IM\Fabric\Package\WordPress\Filter\Filter;
use IM\Fabric\Plugin\TagCloud\DataProvider\WidgetData;
use IM\Fabric\Plugin\TagCloud\Widget\TagCloudWidget;

class TagCloudWidgetSettings extends Filter
{
    public const WIDGET_ID_PREFIX = 'im_tag_cloud_widget-';
    protected $arguments = 3;
    private WidgetData $dataProvider;

    public function __construct(WidgetData $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function filter(...$args)
    {
        [$data, $widgetType, $widgetId] = $args;

        return $widgetType !== TagCloudWidget::ID
            ? $data
            : $this->dataProvider->getOptions(self::WIDGET_ID_PREFIX . $widgetId);
    }
}
