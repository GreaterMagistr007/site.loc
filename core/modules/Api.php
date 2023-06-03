<?php

namespace core\modules;

class Api
{
    // путь к файлу со статьями относительно корня сайта (выше public)
    const ARTICLES_FILE = '/articles/articles.json';

    public function __construct()
    {
        $this->checkArtickesFile();
    }

    public function checkArtickesFile()
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
    }


}