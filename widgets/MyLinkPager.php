<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\widgets\LinkPager;

class MyLinkPager extends LinkPager
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
            return;
        }

        if ($this->pagination->getPageCount() < 1 && !$this->forcePageParam) {
            return;
        }

        $buttons = [];
        $currentPage = $this->pagination->getPage();

        // Кнопка "предыдущая страница"
        if ($this->prevPageLabel !== false && $currentPage > 0) {
            $this->nextPageLabel='Previous';
            $buttons[] = Html::tag('li', Html::a($this->prevPageLabel, $this->pagination->createUrl($currentPage), $this->linkOptions), ['class' => 'prev']);
        }

        // Кнопки с номерами страниц
        foreach ($this->pagination->getLinks() as $page => $label) {
            $this->nextPageLabel='Previous';
            $buttons[] = Html::tag('li', Html::a($label, $this->pagination->createUrl($page), $this->linkOptions), ['class' => $page == $currentPage ? 'active' : '']);
        }

        // Кнопка "следующая страница"
        if ($this->nextPageLabel !== false && $currentPage < $this->pagination->getPageCount() - 1) {
            $this->nextPageLabel='Next';
            $buttons[] = Html::tag('li', Html::a($this->nextPageLabel, $this->pagination->createUrl($currentPage + 1), $this->linkOptions), ['class' => 'next']);
        }

        echo Html::tag('ul', implode("\n", $buttons), $this->options);
    }
}