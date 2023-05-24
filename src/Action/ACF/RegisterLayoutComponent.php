<?php

namespace IM\Fabric\Plugin\TagCloud\Action\ACF;

use IM\Fabric\Package\FormWrapper\Form\Rule;
use IM\Fabric\Package\WordPress\Action\Action;
use IM\Fabric\Package\FormWrapper\Form\RuleCollection;
use IM\Fabric\Package\FormWrapper\Service\ComponentRegistrationInterface;
use IM\Fabric\Plugin\TagCloud\Factory\ACF\LayoutComponentFactory;
use IM\Fabric\Plugin\TagCloud\Widget\TagCloudWidget;

class RegisterLayoutComponent extends Action
{
    public const TAG_CLOUD_WIDGET_FORM = 'acf_im_tag_cloud_widget';

    protected ComponentRegistrationInterface $component;

    protected LayoutComponentFactory $layoutFactory;

    public function __construct(
        ComponentRegistrationInterface $component,
        LayoutComponentFactory $layoutFactor
    ) {
        $this->component = $component;
        $this->layoutFactory = $layoutFactor;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function action(...$args)
    {
        $this->component->register(
            $this->layoutFactory->create(self::TAG_CLOUD_WIDGET_FORM),
            $this->buildRuleCollection()
        );
    }

    private function buildRuleCollection(): RuleCollection
    {
        return new RuleCollection(
            new Rule('widget', '==', TagCloudWidget::ID)
        );
    }
}
