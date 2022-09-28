<?php

namespace App\Requests;

use App\Models\Task;
use Core\Request;
use Exception;

class SaveTaskRequest extends Request
{
    /**
     * @throws Exception
     */
    public function validate(): void
    {
        if (
            empty($this->get('id')) ||
            !Task::query()->where('id', $this->get('id'))->exists()
        )
            throw new Exception('Validation error');
    }

    public function mutate(): void
    {
        $this->data['done'] = (integer)$this->data['done'];
    }
}