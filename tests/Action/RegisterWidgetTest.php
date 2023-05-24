<?php

namespace IM\Fabric\Plugin\TagCloud\Test\Action;

use IM\Fabric\Plugin\TagCloud\Action\RegisterWidget;
use IM\Fabric\Plugin\TagCloud\Widget\TagCloudWidget;
use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery;
use WP_Mock;

class RegisterWidgetTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    private RegisterWidget $unit;

    public function setUp(): void
    {
        $this->unit = new RegisterWidget(Mockery::mock(TagCloudWidget::class));
    }

    public function testRegisterWidgetIsCalled()
    {
        WP_Mock::userFunction('register_widget', [
            'args' => [TagCloudWidget::class],
            'times' => 1
        ]);

        $this->unit->action([]);
    }
}
