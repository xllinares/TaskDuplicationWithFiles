<?php
namespace Kanboard\Plugin\TaskDuplicationWithFiles\Model;

use Kanboard\Model\TaskDuplicationModel;

class TaskDuplicationWithFilesModel extends TaskDuplicationModel
{
    public function duplicate($task_id)
    {
        $new_task_id = parent::duplicate($task_id);

        if ($new_task_id !== false) {
            $attachments = $this->taskFileModel->getAll($task_id);

            foreach ($attachments as $attachment) {
                $this->taskFileModel->create($new_task_id, $attachment['name'], $attachment['path'], $attachment['size'], $attachment['user_id'], $attachment['is_image']);
            }

            $coverimage = $this->coverimageModel->getCoverimage($task_id);
            if ($coverimage !== null) {
                $this->coverimageModel->setCoverimage($new_task_id, $coverimage['id']);
            }
        }

        return $new_task_id;
    }
}
