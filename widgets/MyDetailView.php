<?php

namespace app\widgets;

use yii\widgets\DetailView;
use yii\helpers\Html;

class MyDetailView extends DetailView
{
    /**
     * Renders a single attribute.
     * @param array $attribute the specification of the attribute to be rendered.
     * @param mixed $index the zero-based index of the attribute in the [[attributes]] array
     * @return string the rendering result
     */
    protected function renderAttribute($attribute, $index): string
    {
        $content = parent::renderAttribute($attribute, $index);
        $value = $attribute['value'] ?? $this->formatter->format($this->model->{$attribute['attribute']}, $attribute['format']);
        $label = $attribute['label'] ?: $this->model->getAttributeLabel($attribute['attribute']);

        return Html::tag('p', Html::tag('strong', $label) . ': ' . $value);
    }
}