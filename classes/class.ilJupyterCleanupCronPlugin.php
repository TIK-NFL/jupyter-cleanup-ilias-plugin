<?php

include_once("./Services/Cron/classes/class.ilCronHookPlugin.php");

class ilJupyterCleanupCronPlugin extends ilCronHookPlugin
{
    const PLUGIN_NAME = 'JupyterCleanupCron';
    const PLUGIN_ID = 'jupytercleanupcron';

    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance) {
            return self::$instance;
        }

        global $DIC;
        $component_factory = $DIC["component.factory"];
        return self::$instance = $component_factory->getPlugin(self::PLUGIN_ID);
    }

    public function getPluginName(): string
    {
        return self::PLUGIN_NAME;
    }

    public function getCronJobInstance($jobId): ilCronJob
    {
        return new ilJupyterCleanupCronJob();
    }

    public function getCronJobInstances(): array
    {
        return array(new ilJupyterCleanupCronJob());
    }

    protected function init(): void
    {
        $this->initAutoLoad();
    }

    protected function initAutoLoad()
    {
        spl_autoload_register(
            array($this, 'autoLoad')
        );
    }

    private final function autoLoad($a_classname)
    {
        $class_file = $this->getClassesDirectory() . '/class.' . $a_classname . '.php';
        if (@include_once($class_file)) {
            return;
        }
    }

    protected function getClassesDirectory(): string
    {
        return $this->getDirectory() . "/classes";
    }

}