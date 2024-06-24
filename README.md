## Jupyter cleanup plugin for ILIAS

This cron-based plugin executes cleanups of Jupyter resources which are mainly managed by the **Jupyter ILIAS plugin**.

### Requirements

| Dependency                                                              | Version  |
|-------------------------------------------------------------------------|----------|
| [ILIAS](https://github.com/ILIAS-eLearning/ILIAS)                       | >= 8.0.0 |
| [jupyter-ilias-plugin](https://github.com/TIK-NFL/jupyter-ilias-plugin) | >= 1.0.0 |


### Install

1. Access the installation root directory of your running ILIAS instance (e.g.,  `/var/www/ilias`) and clone the ***JupyterCleanupCron*** plugin as follows:
    ```
    git clone https://github.com/TIK-NFL/jupyter-cleanup-ilias-plugin.git ./Customizing/global/plugins/Services/Cron/CronHook/JupyterCleanupCron
    ```
2. Access ILIAS by a web browser and go to:  **Administration  →  Extending ILIAS  →  Plugins**.
3. Locate the ***JupyterCleanupCron*** plugin, install it by clicking **Actions → Install** and activate it by clicking **Actions → Activate**.
4. Make sure that the corresponding Cron Job ***JupyterCleanupCron*** is also activated: **Administration  → System Settings and Maintenance → Cron Jobs → Activate**.
