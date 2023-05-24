<?php

namespace IM\Fabric\Plugin\TagCloud\DataProvider;

class WidgetData
{
    public function getOptions($widgetId): array
    {
        $instanceKey = $this->getWidgetInstanceDBKey($widgetId);

        return [
            'taxonomies' => get_option($instanceKey . 'taxonomy-groups', [])
        ];
    }

    private function getWidgetInstanceDBKey(string $widgetId): string
    {
        return 'widget_' . $widgetId . '_acf_im_tag_cloud_widget-';
    }
}
