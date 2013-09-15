<?php
/**
 * This file is part of the RedKiteCms CMS Application and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) RedKite Labs <info@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */
 
namespace RedKiteCms\Block\CKEditorBlockBundle\Tests\Controller;

use RedKiteLabs\RedKiteCmsBundle\Tests\TestCase;
use RedKiteCms\Block\CKEditorBlockBundle\Controller\MediaLibraryController;

/**
 * MediaLibraryControllerTest
 */
class MediaLibraryControllerTest extends TestCase
{
    public function testShow()
    {
        $request = $this->getMock('Symfony\Component\HttpFoundation\Request');
        $request->expects($this->exactly(2))
            ->method('getBaseUrl')
            ->will($this->returnValue(''))
        ; 
        
        $options = array(
            'enable_yui_compressor' => true,
            'assets_folder' => 'path/to/assets/folder',
            'frontController' => '/',
        );
        
        $templating = $this->getMock('Symfony\Bundle\FrameworkBundle\Templating\EngineInterface');
        $templating
             ->expects($this->once())
             ->method('renderResponse')
             ->with('CKEditorBlockBundle:Elfinder:media_library.html.twig', $options)
        ;    

        $container = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $container->expects($this->at(0))
             ->method('get')
             ->with('request')
             ->will($this->returnValue($request));
             
        $container->expects($this->at(1))
             ->method('get')
             ->with('templating')
             ->will($this->returnValue($templating));
             
        $container->expects($this->at(2))
             ->method('getParameter')
             ->with('alpha_lemon_cms.enable_yui_compressor')
             ->will($this->returnValue(true));
             
        $container->expects($this->at(3))
             ->method('get')
             ->with('request')
             ->will($this->returnValue($request));
             
        $container->expects($this->at(4))
             ->method('getParameter')
             ->with('alpha_lemon_cms.upload_assets_dir')
             ->will($this->returnValue('path/to/assets/folder'));

        $controller = new MediaLibraryController();
        $controller->setContainer($container);
        $controller->showAction();
    }
}
