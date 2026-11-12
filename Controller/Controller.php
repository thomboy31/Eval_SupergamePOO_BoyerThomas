<?php

class Controller{
    private Model $model;
    private View $view;


    

    /**
     * Get the value of model
     *
     * @return Model
     */
    public function getModel(): Model {
        return $this->model;
    }

    public function __construct(Model $model, View $view) {
    $this->model = $model;
    $this->view = $view;
}
    /**
     * Set the value of model
     *
     * @param Model $model
     *
     * @return self
     */
    public function setModel(Model $model): self {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the value of view
     *
     * @return View
     */
    public function getView(): View {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @param View $view
     *
     * @return self
     */
    public function setView(View $view): self {
        $this->view = $view;
        return $this;
    }

    public function render(): void {
    $this->view->displayAll();
}
}