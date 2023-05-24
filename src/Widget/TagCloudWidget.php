<?php

namespace IM\Fabric\Plugin\TagCloud\Widget;

use WP_Widget;

class TagCloudWidget extends WP_Widget
{
    public const ID = 'im_tag_cloud_widget';
    private const OPTIONS = [
        'description' => 'IM Tag Cloud Widget',
    ];
    private const NAME = 'Tag Cloud Widget';

    public function __construct()
    {
        parent::__construct(self::ID, self::NAME, self::OPTIONS);
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function widget($args, $instance)
    {
        return null;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function form($instance)
    {
    }
}
