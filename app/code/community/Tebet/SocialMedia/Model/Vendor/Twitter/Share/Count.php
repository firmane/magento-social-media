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

class Tebet_SocialMedia_Model_Vendor_Twitter_Share_Count
{
    const API_RESOURCE_URL = 'http://cdn.api.twitter.com/1/urls/count.json';

    public function getUrlCount($url)
    {
        $httpClient = new Tebet_SocialMedia_Model_Http_Client();
        $response = $httpClient->setUri(self::API_RESOURCE_URL)
                ->setParameterGet(array('url' => $url))
                ->setConfig(array('timeout' => 5))
                ->request('GET');

        $count = 0;
        if ($response) {
            $result = json_decode($response->getBody(), true);
            $count  = isset($result['count']) ? $result['count'] : $count;
        }

        return $count;
    }
}