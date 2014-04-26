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

class Tebet_SocialMedia_Model_Observer
{
    public function updateCount(Mage_Cron_Model_Schedule $schedule)
    {
        $collection = Mage::getModel('socialmedia/share')->getCollection();
        $collection->addUpdateRequiredFilter();

        foreach($collection as $item) {
            $count = $this->getUrlCount($item->getUrl());
            foreach ($count as $field => $value) {
                $item->setData($field, $value);
            }
            $item->save();
        }

        return $this;
    }

    public function getUrlCount($url)
    {
        $resources = array(
            'facebook'   => 'socialmedia/vendor_facebook_share_count',
            'twitter'    => 'socialmedia/vendor_twitter_share_count',
            'googleplus' => 'socialmedia/vendor_googleplus_share_count',
            'linkedin'   => 'socialmedia/vendor_linkedin_share_count',
            'pinterest'  => 'socialmedia/vendor_pinterest_share_count',
        );

        $count = array('total_count' => 0);
        foreach ($resources as $vendor => $classname) {
            $key = $vendor . '_count';
            $singleton = Mage::getSingleton($classname);
            $count[$key] = $singleton->getUrlCount($url);
            $count['total_count'] += $count[$key];
        }

        return $count;
    }
}