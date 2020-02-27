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

namespace Namespace\Module\Plugin\Catalog\Model\Category\Attribute\Backend;

use Magento\Catalog\Model\Category\Attribute\Backend\Image;
use Magento\Catalog\Model\Category;

class ImagePlugin
{
    /**
     * Fix for bad urls on 2.3.4
     * @param Image $subject
     * @param \Closure $proceed
     * @param $category
     */
    public function aroundBeforeSave(Image $subject, \Closure $proceed, $category)
    {
        $attributeName = $subject->getAttribute()->getName();
        
        /**
         * Retrieve the existing image field data
         * Copy this as many times as fields you need
         * Replace getImageFieldName with your field name
         */
        $imageFiles = $category->getImageFieldName();

        $proceed($category);

        /**
         * If image field has data set it
         * Replace attribute_name with you attribute code
         * Replace setImageFieldName with your field name
         */
        if (isset($imageFiles[0]['name']) && $attributeName == 'attribute_name') {
            $category->setImageFieldName($imageFiles[0]['name']);
        }
    }
}
