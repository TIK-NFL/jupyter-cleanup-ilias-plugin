<?php

include_once "Services/Cron/classes/class.ilCronJob.php";

class ilJupyterCleanupCronJob extends ilCronJob
{
    public function getId(): string
    {
        return ilJupyterCleanupCronPlugin::getInstance()->getId();
    }

    public function getTitle(): string
    {
        return ilJupyterCleanupCronPlugin::PLUGIN_NAME;
    }

    public function getDescription(): string
    {
        return ilJupyterCleanupCronPlugin::getInstance()->txt('cron_job_info');
    }

    public function getDefaultScheduleType(): int
    {
        return self::SCHEDULE_TYPE_IN_MINUTES;
    }

    public function getDefaultScheduleValue(): ?int
    {
        return 1;
    }

    public function hasAutoActivation(): bool
    {
        return true;
    }

    public function hasFlexibleSchedule(): bool
    {
        return true;
    }

    public function hasCustomSettings(): bool
    {
        return false;
    }

    public function run(): ilCronJobResult
    {
        $result = new ilCronJobResult();
        $assJupyter = ilassJupyterPlugin::getInstance();

        if ($assJupyter->isActive()) {
            $assJupyter->handleCronJob();
            $result->setStatus(ilCronJobResult::STATUS_OK);
        }

        return $result;
    }
}
