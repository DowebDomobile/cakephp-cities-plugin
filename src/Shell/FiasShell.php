<?php
namespace Dwdm\Cities\Shell;

use Cake\Console\Shell;
use Cake\Utility\Hash;

/**
 * Fias shell command.
 */
class FiasShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $parser->addSubcommand('parse', [
            'help' => 'Parse address objects file.',
            'parser' => [
                'arguments' => ['input' => ['help' => 'Input filename.', 'required' => true]],
                'options' => [
                    'regions' => ['help' => 'Regions output file.', 'short' => 'r', 'default' => false],
                    'districts' => ['help' => 'Districts output file.', 'short' => 'd', 'default' => false],
                    'cities' => ['help' => 'Cities output file.', 'short' => 'c', 'default' => false],
                ]
            ]
        ]);

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out($this->OptionParser->help());
    }

    public function parse($input)
    {
        $xml = fopen($input, 'r');

        $levels = [
            1 => $this->getLevel('regions'),
            3 => $this->getLevel('districts'),
            4 => $this->getLevel('cities'),
            6 => $this->getLevel('cities'),
        ];

        if ($this->_isXml($xml)) {
            while (!empty($buffer = $this->_readTag($xml))) {
                foreach ($levels as $level => $options) {
                    if ($options->file && strpos($buffer, "AOLEVEL=\"$level\"")) {
                        if (!is_resource($options->file)) {
                            $options->file = fopen($options->file, 'w');
                        }
                        $data = $this->{'_prepare' . ucfirst($options->name)}(simplexml_load_string($buffer));
                        fputcsv($options->file, $data);
                    }
                }
            }
        }
    }

    protected function _prepareRegions(\SimpleXMLElement $xmlObject)
    {
        $attributes = ((array)$xmlObject->attributes())['@attributes'];

//        if (in_array($attributes['REGIONCODE'], ['02', '24', '55', '66', '34', '76', '75'])) {
//            $a = 1;
//        }

        return [
            'code' => $attributes['REGIONCODE'],
            'plain' => $attributes['PLAINCODE'],
            'name' => $attributes['FORMALNAME'],
            'off' => $attributes['OFFNAME'],
            'short' => $attributes['SHORTNAME'],
            'live' => (string)Hash::get($attributes, 'LIVESTATUS', '0'),
        ];
    }

    protected function _prepareDistricts(\SimpleXMLElement $xmlObject)
    {
        $attributes = ((array)$xmlObject->attributes())['@attributes'];

        return [
            'regionCode' => $attributes['REGIONCODE'],
            'code' => $attributes['AREACODE'],
            'plain' => $attributes['PLAINCODE'],
            'name' => $attributes['FORMALNAME'],
            'off' => $attributes['OFFNAME'],
            'short' => $attributes['SHORTNAME'],
            'live' => (string)Hash::get($attributes, 'LIVESTATUS', '0'),
        ];
    }

    protected function _prepareCities(\SimpleXMLElement $xmlObject)
    {
        $attributes = ((array)$xmlObject->attributes())['@attributes'];

        return [
            'regionCode' => $attributes['REGIONCODE'],
            'areaCode' => $attributes['AREACODE'],
            'code' => $attributes['CITYCODE'] === '000' ? $attributes['PLACECODE'] : $attributes['CITYCODE'],
            'plain' => $attributes['PLAINCODE'],
            'name' => $attributes['FORMALNAME'],
            'off' => $attributes['OFFNAME'],
            'short' => $attributes['SHORTNAME'],
            'live' => (string)Hash::get($attributes, 'LIVESTATUS', '0'),
        ];
    }

    protected function _isXml($xml)
    {
        return $this->_readTag($xml) == '<?xml version="1.0" encoding="utf-8"?>';
    }

    protected function _readTag($xml)
    {
        $isTagOpen = false;
        $buffer = '';

        while (($char = fgetc($xml)) !== false) {
            if ($char == '<') {
                $isTagOpen = true;
            }

            if ($isTagOpen) {
                $buffer .= $char;
            }

            if ($char == '>' && $isTagOpen) {
                break;
            }
        }

        return $buffer;
    }

    public function getLevel($name)
    {
        $param = $this->param($name);
        return (object) [
            'file' => $param === true ? $name . '.csv' : $param,
            'name' => $name,
        ];
    }
}
