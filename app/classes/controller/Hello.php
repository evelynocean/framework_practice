<?php

class Hello
{
    public function action_index()
    {
        $view = new \Core\Classes\View();
        $view->data = array(
            'test1' => 'Hello 1',
        );

        $vv = $view->render('hello/hello1');
        echo $vv;
    }

    public function action_sorry()
    {
        $view = new \Core\Classes\View();
        $view->data = array(
            'test2' => 'Hello 2',
        );

        $vv = $view->render('test');
        echo $vv;
    }
}