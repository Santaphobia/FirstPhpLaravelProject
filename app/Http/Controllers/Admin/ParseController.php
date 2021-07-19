<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParseController extends Controller
{
    public function index() {
        $xml = XmlParser::load('https://news.yandex.ru/sport.rss');
        $xml_parse = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,publication_date]'],
        ]);
        foreach ($xml_parse['news'] as $key=>$value ) {
            $news = new News();
            $news->fill([
                'title' => $value['title'],
                'description' => $value['description'],
                'publication_date' => $value['publication_date'],
                'categories_id' => 1,
                'is_active' => true,
                'text' => $value['link']
            ]);
            $news->save();
        }
        return redirect()->route('home.index');
    }
}
