<?php
/**
 * @copyright     Copyright (c) DowebDomobile (http://dowebdomobile.ru)
 */

namespace Dwdm\Cities;

/**
 * Class Csv
 */
class Csv
{
    protected $_dir;

    protected $_currentName;

    protected $_fp;

    protected $_header;

    public function __construct($dir)
    {
        $this->_dir = $dir;
    }

    public function read($name, $map, $count = 100)
    {
        if ($this->_currentName != $name) {
            $this->_fp = fopen($this->_dir . $name, 'r');
            $header = fgetcsv($this->_fp, null, ',');
            $this->_header = array_flip($header);
            $this->_currentName = $name;
        }

        $header = isset($header) ? $header : $this->_header;

        $data = [];
        while (($count >= 0) && ($row = fgetcsv($this->_fp, null, ','))) {
            $dataRow = [];
            if (is_callable($map)) {
                $dataRow = call_user_func($map, $header, $row);
            } elseif (is_array($map)) {
                foreach ($map as $k => $v) {
                    $dataRow[$k] = !empty($row[$this->_header[$v]]) ? $row[$this->_header[$v]] : null;
                }
            }

            if (!empty($dataRow)) {
                $count--;
                $data[] = $dataRow;
            }
        }

        if (empty($data)) {
            fclose($this->_fp);
            $data = false;
        }

        return $data;
    }
}