<?php
/*
 * This file is part of the CKEditorBlockBundle and it is distributed
 * under the MIT LICENSE. To use this application you must leave intact this copyright 
 * notice.
 *
 * Copyright (c) RedKite Labs <info@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 * 
 * @license    MIT LICENSE
 * 
 */
namespace RedKiteCms\Block\CKEditorBlockBundle\Controller;

use RedKiteLabs\RedKiteCmsBundle\Controller\AlCmsController;
use RedKiteLabs\RedKiteCmsBundle\Core\AssetsPath\AlAssetsPath;

/**
 * Connects ElFinder with CKEditor
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class MediaLibraryController extends AlCmsController
{
    /**
     * Opens ElFinder
     */
    public function showAction()
    {
        $request = $this->container->get('request');
        
        return $this->container->get('templating')->renderResponse('CKEditorBlockBundle:Elfinder:media_library.html.twig', array(
            'enable_yui_compressor' => $this->container->getParameter('red_kite_cms.enable_yui_compressor'),
            'assets_folder' => AlAssetsPath::getUploadFolder($this->container),
            'frontController' => $this->getFrontcontroller($request),
        ));
    }
}
