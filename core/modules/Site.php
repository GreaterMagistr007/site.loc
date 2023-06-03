<?php

namespace core\modules;

use theme\Theme;

class Site
{
    public Theme $theme;

    public function __construct()
    {
        $this->theme = new Theme();
    }

    public function getMainPage()
    {
        $this->theme->mainPage();
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