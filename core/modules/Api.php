<?php

namespace core\modules;

class Api
{
    // путь к файлу со статьями относительно корня сайта (выше public)
    const ARTICLES_FILE = '/articles/articles.json';

    public static $token = CONFIG['token'];

    private string $articlesFile;

    public function __construct()
    {
        $this->articlesFile = $this->getArticlesFile();
    }

    /**
     * Получить маршрут к файлу со статьями
     * @return string
     */
    public function getArticlesFile()
    {
        $file = DS(site_dir(self::ARTICLES_FILE));

        if (!file_exists($file)) {
            // Создадим директории на пути к файлу:
            $directories = [];
            $path = explode(DS(), $file);
            foreach ($path as $dir) {
                if (!$dir) {
                    // пустые директории создавать не будем
                    return false;
                }
                $directories[] = $dir;
            }

            if (!file_exists($directories)) {
                mkdir(implode(DS(), $directories));
            }
            file_put_contents($file, '{}');
        }

        return $file;
    }

    public function checkArtickesFile()
    {
        $file = $this->getArticlesFile();
        success([
            'file' => $file
        ]);
    }

    public function getArticles()
    {
        $articles = json_decode(file_get_contents($this->getArticlesFile()));

        success([
            'articles' => $articles
        ]);
    }

    public function addArticle()
    {

    }

}