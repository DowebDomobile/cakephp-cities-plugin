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
    /**
     * {@inheritDoc}
     */
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
                'name' => $data['name'] . '_name',
                'attrs' => $this->_templates->formatAttributes(['value' => $data['stringValue']] + $data, ['name'])
            ]) . $this->_templates->format('input', [
                'type' => 'hidden',
                'name' => $data['name'],
                'attrs' => $this->_templates->formatAttributes([
                    'id' => $data['id'] . '-hidden',
                    'value' => $data['val'],
                    'class' => 'js-autocomplete-hidden'
                ], ['name'])
            ]);
    }

    /**
     * {@inheritDoc}
     */
    public function secureFields(array $data)
    {
        if (!isset($data['name']) || $data['name'] === '') {
            return [];
        }

        return [$data['name'], $data['name'] . '_name'];
    }

}