# Tracedock plugin for Craft CMS 3.x

This plugin allows you to implement the Tracedock snippet to your website without adding it to the Twig files. Configuration can be done via the admin. Tracedock should not be implemented via Google Tag Manager and so direct injection into the head section is neccesary.

This is an unofficial plugin! For support please open an issue in this Github repo.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require jrm93/craft-tracedock

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Tracedock.

Alternatively you could install the plugin via de plugin admin directly.

## Configuring Tracedock

Go to Settings > Tracedock and input the needed settings. These can be found in your Tracedock account page.

## Tracedock Roadmap

* Make plugin multisite compatible

Please open an issue if you encounter any problems or have a feature request.

Brought to you by [JRM93](https://www.adwise.nl/)
