<?php

/**
 * Tracedock plugin for Craft CMS 3.x
 *
 * Test
 *
 * @author    JRM93
 * @copyright Copyright (c) 2022 JRM93
 * @link      https://github.com/JRM93
 * @package   Tracedock
 * @since     1.0.0
 */

namespace adwise\tracedock;

use adwise\tracedock\models\Settings;

use Craft;
use craft\web\View;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class Tracedock
 *
 * @author    Adwise
 * @package   Tracedock
 * @since     1.0.0
 *
 */
class Tracedock extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Tracedock
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '0.0.1';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $request = Craft::$app->getRequest();
        $domain = $this->getSettings()->domain;
        $url = $this->getSettings()->url;
        $active = $this->getSettings()->active;

        if (
            $this->isInstalled
            && !$request->isCpRequest
            && !$request->isConsoleRequest
            && !empty($domain)
            && !empty($url)
            && $active == true
        ) {
            $view = Craft::$app->getView();
            $snippet = '!function(e,t,n,r,o,i,u,c,a,l){a=n.getElementsByTagName("head")[0],(l=n.createElement("script")).async=1,l.src=t,a.appendChild(l),r=n.cookie;try{if(i=(" "+r).match(new RegExp("[; ]_tdbu=([^\\s;]*)")))for(u in o=decodeURI(i[1]).split("||"))(c=o[u].split("~~"))[1]&&(r.indexOf(c[0]+"=")>-1||(n.cookie=c[0]+"="+c[1]+";path=/;max-age=604800;domain=."+e,n.cookie="_1=1"))}catch(e){}}("' . $domain . '","' . $url . '",document)';
            $view->registerScript($snippet, 1);
        }

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'tracedock',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'tracedock/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
