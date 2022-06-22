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


namespace adwise\tracedock\models;

use adwise\tracedock\Tracedock;

use Craft;
use craft\base\Model;

/**
 * @author    Adwise
 * @package   Tracedock
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $active = false;
    public $domain;
    public $url;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['active', 'boolean'],
            ['domain', 'string'],
            ['url', 'url']
        ];
    }
}
