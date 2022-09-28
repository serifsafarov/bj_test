<?php

namespace App\Requests;

use Core\Request;
use Exception;

class AddTaskRequest extends Request
{
    /**
     * @throws Exception
     */
    public function validate(): void
    {
        if (empty($this->get('name')))
            $message = 'Name is required';
        if (empty($this->get('description')))
            $message = 'Description is required';
        if (
            empty($this->get('email')) ||
            !stristr($this->get('email'), '@')
        )
            $message = 'Email is invalid';
        if (!empty($message)) {
            if ($this->isXMLHTTP)
                abort(400, $message);
            else
                throw new Exception($message);
        }
    }
}