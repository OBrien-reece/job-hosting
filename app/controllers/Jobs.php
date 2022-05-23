<?php

class Jobs extends Controller {

    public function home() {

        $data = [];

        $this->view('jobs/home', $data);
    }
}