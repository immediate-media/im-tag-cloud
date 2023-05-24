<?php

namespace IM\Fabric\Plugin\TagCloud\Test\Factory\ACF;

use IM\Fabric\Plugin\TagCloud\Action\ACF\RegisterLayoutComponent;
use IM\Fabric\Plugin\TagCloud\Factory\ACF\LayoutComponentFactory;
use IM\Fabric\Package\FormWrapper\Form\Config\ComponentConfig;
use IM\Fabric\Package\FormWrapper\Form\Component;
use IM\Fabric\Package\FormWrapper\Form\Input;
use PHPUnit\Framework\TestCase;
use WP_Mock;

class LayoutComponentFactoryTest extends TestCase
{
    public function testCreateReturnsSettingsComponentWithExpectedInputs(): void
    {
        WP_Mock::userFunction('get_taxonomies', [
            'return' => []
        ]);

        $factory = new LayoutComponentFactory();
        $component = $factory->create(RegisterLayoutComponent::TAG_CLOUD_WIDGET_FORM);

        $this->assertSame(ComponentConfig::SEAMLESS_DEFAULT, $component->getSeamless());

        $this->assertCount(1, $component->listInputs());
        $this->assertComponentInputExists(
            $component,
            RegisterLayoutComponent::TAG_CLOUD_WIDGET_FORM . '-taxonomy-groups'
        );
    }

    private function assertComponentInputExists(Component $component, string $inputName): void
    {
        $this->assertInstanceOf(Input::class, $component->getInput($inputName));
    }
}
