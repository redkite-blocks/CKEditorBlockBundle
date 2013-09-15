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

namespace RedKiteCms\Block\CKEditorBlockBundle\Core\Block;

use RedKiteLabs\RedKiteCmsBundle\Core\Content\Block\InlineTextBlock\AlBlockManagerInlineTextBlock;

/**
 * Defines the Block Manager to handle a Content managed by CKEditor 
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class AlBlockManagerCKEditorBlock extends AlBlockManagerInlineTextBlock
{    
    /**
     * {@inheritdoc}
     */
    protected function renderHtml()
    {
        return array('RenderView' => array(
            'view' => 'CKEditorBlockBundle:Content:text.html.twig',
            'options' => array(
                'content' => $this->alBlock->getContent(), 
                'id' => $this->alBlock->getId()
            ),
        ));
    }
}
