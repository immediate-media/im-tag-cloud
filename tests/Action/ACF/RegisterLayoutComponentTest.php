<?php

namespace IM\Fabric\Plugin\TagCloud\Test\Action\ACF;

use IM\Fabric\Plugin\TagCloud\Action\ACF\RegisterLayoutComponent;
use IM\Fabric\Plugin\TagCloud\Factory\ACF\LayoutComponentFactory;
use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use IM\Fabric\Package\FormWrapper\Service\ComponentRegistrationInterface;
use IM\Fabric\Package\FormWrapper\Form\Component;
use IM\Fabric\Package\FormWrapper\Form\RuleCollection;
use IM\Fabric\Package\WordPress\Action\Action;
use Mockery;

class RegisterLayoutComponentTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    private ComponentRegistrationInterface $component;

    private LayoutComponentFactory $layoutFactory;

    private RegisterLayoutComponent $registerComponent;

    public function setUp(): void
    {
        $this->layoutFactory = Mockery::mock(LayoutComponentFactory::class);
        $this->layoutFactory->allows('create')->andReturn(Mockery::mock(Component::class));

        $this->component = Mockery::mock(ComponentRegistrationInterface::class);

        $this->registerComponent = new RegisterLayoutComponent(
            $this->component,
            $this->layoutFactory
        );
    }

    public function testClassExtendsAction()
    {
        $this->assertInstanceOf(Action::class, $this->registerComponent);
    }

    public function testRegisterLayoutComponentAction()
    {
        $this->component->expects('register')
            ->with(Component::class, RuleCollection::class);

        $this->registerComponent->action();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }
}
