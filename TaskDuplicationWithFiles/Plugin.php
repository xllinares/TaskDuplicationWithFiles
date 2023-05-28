<?php

namespace Kanboard\Plugin\TaskDuplicationWithFiles;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Plugin\TaskDuplicationWithFiles\Model\TaskDuplicationWithFilesModel;

class Plugin extends Base
{
    public function initialize()
    {
        $this->container['taskDuplicationModel'] = $this->container->factory(function ($c) {
            return new TaskDuplicationWithFilesModel($c);
        });
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'TaskDuplicationWithFiles';
    }

    public function getPluginDescription()
    {
        return t('This plugin duplicates tasks along with their attached files.');
    }

    public function getPluginAuthor()
    {
        return 'Autoritas Consulting';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/xllinares/TaskDuplicationWithFiles';
    }
}
