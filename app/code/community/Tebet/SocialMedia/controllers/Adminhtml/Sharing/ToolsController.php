<?php
/**
 * Magento - Social Media
 *
 * Engage the most influential audiences on the most social content
 * and see superior results.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Tebet
 * @package    Tebet_SocialMedia
 * @copyright  Copyright (c) 2013 Firman Efendi <firman.elance@yahoo.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Tebet_SocialMedia_Adminhtml_Sharing_ToolsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('SocialMedia'))
             ->_title($this->__('Sharing Tools'));

        $this->loadLayout();
        $this->_setActiveMenu('socialmedia/sharing_tools');
        $this->renderLayout();
    }
}