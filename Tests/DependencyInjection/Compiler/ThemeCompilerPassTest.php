<?php

namespace Liip\ThemeBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Liip\ThemeBundle\DependencyInjection\Compiler\ThemeCompilerPass;

class ThemeCompilerPassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Liip\ThemeBundle\DependencyInjection\Compiler\ThemeCompilerPass::process
     */
    public function testProcess()
    {
        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerBuilder');

        $containerMock->expects($this->exactly(2))
            ->method('setAlias')
        ;

        $containerMock->expects($this->once())
            ->method('getParameter')
            ->with('liip_theme.cache_warming')
            ->will($this->returnValue(true))
        ;

        $themeCompiler = new ThemeCompilerPass();
        $themeCompiler->process($containerMock);
    }
}
