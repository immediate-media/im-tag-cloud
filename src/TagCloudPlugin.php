<?php

declare(strict_types=1);

namespace IM\Fabric\Plugin\TagCloud;

use IM\Fabric\Package\Plugin\WordPressPlugin;
use IM\Fabric\Package\FormWrapper\Service\ACFComponentRegistration;
use IM\Fabric\Package\FormWrapper\Service\ComponentRegistrationInterface;
use IM\Fabric\Package\HeadlessApiContracts\FilterConstants;
use IM\Fabric\Plugin\TagCloud\Filter\Admin\Settings\TagCloudWidgetSettings;

class TagCloudPlugin extends WordPressPlugin
{
    public const PLUGIN_ID = 'im-tag-cloud';

    /**
     * The 'run' method is the core of the plugin functionality
     * It acts as a "Controller Action" method
     */
    public function run(): void
    {
        $this->wordPress->addAction('widgets_init', $this->get(Action\RegisterWidget::class));
        $this->wordPress->addAction('wp_loaded', $this->get(Action\ACF\RegisterLayoutComponent::class));

        $this->wordPress->addFilter(
            FilterConstants::SETTINGS_WIDGET_DATA_TRANSFORMATION_FILTER,
            $this->get(TagCloudWidgetSettings::class)
        );
    }

    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    protected function boot()
    {
        $this->add(ComponentRegistrationInterface::class, $this->get(ACFComponentRegistration::class));
    }
}
