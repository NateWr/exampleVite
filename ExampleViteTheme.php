<?php
namespace APP\plugins\themes\exampleVite;

use APP\core\Application;
use APP\plugins\themes\exampleVite\classes\ViteLoader;
use APP\template\TemplateManager;
use PKP\plugins\ThemePlugin;

class ExampleViteTheme extends ThemePlugin {

    public function init() {
        $this->setParent('defaultthemeplugin');
        $this->addViteAssets(['src/main.js']);
    }

    public function getDisplayName() {
        return __('plugins.themes.exampleVite.name');
    }

    public function getDescription() {
        return __('plugins.themes.exampleVite.description');
    }

    /**
     * Add the script, style and other assets compiled by Vite
     *
     * @param array $args Pass arguments to ThemePlugin::addStyle() or TemplateManager::addStylesheet()
     */
    protected function addViteAssets(array $entryPoints, ?array $args = null): void
    {
        $templateMgr = TemplateManager::getManager(
            Application::get()->getRequest()
        );

        $viteLoader = new ViteLoader(
            templateManager: $templateMgr,
            manifestPath: dirname(__FILE__) . '/dist/.vite/manifest.json',
            serverPath: join('/', [dirname(__FILE__), '.vite.server.json']),
            buildUrl: join('/', [$this->getPluginUrl(), 'dist/']),
            prefix: $this->getPluginPath(),
            args: $args
        );

        $viteLoader->load($entryPoints);
    }

    /**
     * Get the URL to the theme's root directory
     */
    public function getPluginUrl(): string
    {
        $request = Application::get()->getRequest();
        $baseUrl = rtrim($request->getBaseUrl(), '/');
        $pluginPath = rtrim($this->getPluginPath(), '/');
        return "{$baseUrl}/{$pluginPath}";
    }
}
