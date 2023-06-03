<?php

namespace core\modules;

class Site
{
    public function getMainPage()
    {
        dd('Главная страница');
    }

    public function getArticlePage()
    {
        dd('Страница статьи');
    }

    public function get404Page()
    {
        dd('Страница 404');
    }
}