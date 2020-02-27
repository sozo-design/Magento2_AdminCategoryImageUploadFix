<?php
/**
 * SOZO Design Ltd
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category    SOZO Design Ltd
 * @package     Sozo_AdminCategoryImageUpload
 * @copyright   Copyright (c) 2020 SOZO Design Ltd (https://sozodesign.co.uk)
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Namespace\Module\Plugin\Catalog\Model;

class ImageUploaderPlugin
{
    /**
     * Fix for magento 2.3.4
     * @param \Magento\Catalog\Model\ImageUploader $subject
     * @param string $path
     * @return string
     */
    public function beforeMoveFileFromTmp(\Magento\Catalog\Model\ImageUploader $subject, $path)
    {
        $posLastSlash = strripos($path, '/');

        return $posLastSlash && strpos($path, '/category/') !== false
            ? substr($path, $posLastSlash + 1)
            : $path;
    }
}
