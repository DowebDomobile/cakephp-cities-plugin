<?php
/**
 * @copyright     Copyright (c) DowebDomobile (http://dowebdomobile.ru)
 */
namespace Dwdm\Cities\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\StringTemplate;
use Cake\View\Widget\BasicWidget;
use Cake\View\Widget\WidgetInterface;

/**
 * Class AutocompleteWodget
 */
class AutocompleteWidget extends BasicWidget
{
    public function render(array $data, ContextInterface $context)
    {
        $data += [
            'name' => '',
            'class' => [],
        ];

        $data['class'] = array_unique(
            array_merge(is_array($data['class']) ? $data['class'] : explode(' ', $data['class']), ['js-autocomplete']));

        return $this->_templates->format('input', [
                'type' => 'text',
                'name' => '',
                'attrs' => $this->_templates->formatAttributes($data, ['name'])
            ]) . $this->_templates->format('input', [
                'type' => 'hidden',
                'name' => $data['name'],
                'attrs' => $this->_templates->formatAttributes([
                    'id' => $data['id'] . '-hidden',
                    'val' => $data['val'],
                    'class' => 'js-autocomplete-hidden'
                ], ['name'])
            ]);
    }
}