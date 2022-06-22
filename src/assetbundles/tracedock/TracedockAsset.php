<?php
/**
 * Tracedock plugin for Craft CMS
 *
 * Tracedock
 *
 * @author    JRM93
 * @copyright Copyright (c) 2022 JRM93
 * @link      https://github.com/JRM93
 * @package   Tracedock
 * @since     1.0.0
 */


namespace adwise\tracedock\assetbundles\tracedock;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    JRM93
 * @package   Tracedock
 * @since     1.0.0
 */
class TracedockAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@adwise/tracedock/assetbundles/tracedock/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Tracedock.js',
        ];

        $this->css = [
            'css/Tracedock.css',
        ];

        parent::init();
    }
}
