<?php

namespace App\Core;

use Exception;

class Instruction
{

    protected $redirect;
    protected $render;
    protected $callback;

    public function __construct(
        protected $entity,
    ) {
    }

    public function redirect(string $url) : self
    {
        $this->redirect = $url;
        return $this;
    }

    public function render(string $view, array $render_params) : self
    {
        $this->render = [
            'view' => $view,
            'params' => $render_params,
        ];

        return $this;
    }

    public function callback(callable $callback) : self
    {
        $this->callback = $callback;
        return $this;
    }

    public function response()
    {
        // TODO: implement
        throw new Exception('Not implemented');
    }

}
