<?php

/*******************************************************************
 *
 * ---------------------------------------------------------------  *
 * RMSOFT MyFolder 1.0                                              *
 * Módulo para el manejo de un portafolio profesional               *
 * CopyRight © 2006. RMSOFT                                *
 * Autor: BitC3R0                                                   *
 * http://www.redmexico.com.mx                                      *
 * http://www.xoops-mexico.net                                      *
 * --------------------------------------------                     *
 * This program is free software; you can redistribute it and/or    *
 * modify it under the terms of the GNU General Public License as   *
 * published by the Free Software Foundation; either version 2 of   *
 * the License, or (at your option) any later version.              *
 *                                                                  *
 * This program is distributed in the hope that it will be useful,  *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of   *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the     *
 * GNU General Public License for more details.                     *
 *                                                                  *
 * You should have received a copy of the GNU General Public        *
 * License along with this program; if not, write to the Free       *
 * Software Foundation, Inc., 59 Temple Place, Suite 330, Boston,   *
 * MA 02111-1307 USA                                                *
 *                                                                  *
 * ---------------------------------------------------------------  *
 * formtexts.class.php:                                             *
 * Clases para campos de formulario                                 *
 * ---------------------------------------------------------------  *
 * @copyright : © 2006. BitC3R0.                                     *
 * @autor     : BitC3R0                                                  *
 * @paquete   : RMSOFT GS 2.0                                          *
 * @modificado: 24/05/2006 12:46:43 a.m.                            *
 *******************************************************************/
class RMText extends RMFormElement
{
    public $_size  = 30;
    public $_max;
    public $_value = '';

    /**
     * Inicializador de la clase
     * @param        $caption
     * @param        $name
     * @param        $size
     * @param        $max
     * @param string $value
     */
    public function __construct($caption, $name, $size, $max, $value = '')
    {
        $this->setName($name);
        $this->setCaption($caption);
        $this->_size  = $size;
        $this->_max   = $max;
        $this->_value = $value;
    }

    public function setSize($size)
    {
        $this->_size = $size;
    }

    public function getSize()
    {
        return $this->_size;
    }

    public function setMax($max)
    {
        $this->_max = $max;
    }

    public function getMax()
    {
        return $this->_max;
    }

    public function setValue($value)
    {
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Devolvemos el codigo HTML del Objeto
     */
    public function render()
    {
        $ret = '<input type="text" size="' . $this->_size . '" name="' . $this->getName() . '" id="' . $this->getName() . '" maxlength="' . $this->getMax() . '" value="' . $this->getValue() . '" ';
        if ($this->getClass() != '') {
            $ret .= 'class="' . $this->getClass() . '" ' . $this->getExtra() . '>';
        } else {
            $ret .= $this->getExtra() . '>';
        }

        return $ret;
    }
}

/**
 * Subtitulos para los formularios
 */
class RMSubTitle extends RMFormElement
{
    public $_type;

    /**
     * @param string $caption Texto del subtitulo
     * @param int    $type    0 = th, 1 = td
     * @param string $class   solo si $type = 1
     */
    public function __construct($caption, $type = 0, $class = 'head')
    {
        $this->setName('');
        $this->setCaption($caption);
        $this->_type = $type;
        $this->setClass($class);
    }

    public function setType($type)
    {
        $this->_type = $type;
    }

    public function getType($type)
    {
        return $this->_type;
    }

    /**
     * Devolvemos el código html
     */
    public function render()
    {
        if ($this->_type == 0) {
            $rtn = "<tr><th colspan='2'>" . $this->getCaption() . '</th></tr>';
        } else {
            $rtn = "<tr class='" . $this->getClass() . "'><td colspan='2'>" . $this->getCaption() . '</td></tr>';
        }

        return $rtn;
    }
}

/**
 * Constructora de TextArea
 */
class RMTextArea extends RMFormElement
{
    public $_rows  = 4;
    public $_cols  = 45;
    public $_value = '';

    public function __construct($caption, $name, $rows = 4, $cols = 45, $value = '')
    {
        $this->_rows  = $rows;
        $this->_cols  = $cols;
        $this->_value = $value;
        $this->setCaption($caption);
        $this->setName($name);
    }

    public function setRows($rows)
    {
        $this->_rows = $rows;
    }

    public function getRows()
    {
        return $this->_rows;
    }

    public function setCols($cols)
    {
        $this->_cols = $cols;
    }

    public function getCols()
    {
        return $this->_cols;
    }

    public function setValue($value)
    {
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Devolvemos el código HTML
     */
    public function render()
    {
        $ret = "<textarea name='" . $this->getName() . "' id='" . $this->getName() . "' cols='" . $this->_cols . "' rows='" . $this->_rows . "' ";
        if ($this->getClass() != '') {
            $ret .= "class='" . $this->getClass() . "' ";
        }
        $ret .= $this->getExtra() . '>' . $this->_value . '</textarea>';

        return $ret;
    }
}

/**
 * Campos Ocultos de formulario
 */
class RMHidden extends RMFormElement
{
    public $_value;

    public function __construct($name, $value)
    {
        $this->setName($name);
        $this->_value = $value;
    }

    public function setValue($value)
    {
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function render()
    {
        $ret = '<input type="hidden" name="' . $this->_name . '" id="' . $this->_name . '" value="' . $this->getValue() . '">';

        return $ret;
    }
}

/**
 * Etiquetas y contenido
 */
class RMLabel extends RMFormElement
{
    public function __construct($caption, $cell)
    {
        $this->setCaption($caption);
        $this->setExtra($cell);
    }

    public function render()
    {
        return $this->getExtra();
    }
}

/**
 * Campo de Archivo
 */
class RMFile extends RMFormElement
{
    public $_size;

    public function __construct($caption, $name, $size = 30)
    {
        $this->_size = $size;
        $this->setCaption($caption);
        $this->setName($name);
    }

    public function setSize($size)
    {
        if ($size > 0) {
            $this->_size = $size;
        }
    }

    public function getSize()
    {
        return $this->_size;
    }

    public function render()
    {
        $ret = '<input type="file" name="' . $this->getName() . '" id="' . $this->getName() . '" size="' . $this->_size . '" ';
        if ($this->getClass() != '') {
            $ret .= "class='" . $this->getClass() . "' ";
        }
        $ret .= $this->getExtra() . '>';

        return $ret;
    }
}

/**
 * Creación de Botones
 */
class RMButton extends RMFormElement
{
    public $_type  = 'submit';
    public $_value = '';

    public function __construct($name, $value, $type = 'submit')
    {
        $this->setName($name);
        $this->_value     = $value;
        $this->_type      = $type;
        $this->setCaption = '&nbsp;';
    }

    public function setType($type)
    {
        $this->_type = $type;
    }

    public function getType($type)
    {
        return $this->_type;
    }

    public function setValue($value)
    {
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Devolvemos el codigo HTML
     */
    public function render()
    {
        $ret = "<input type='" . $this->_type . "' name='" . $this->getName() . "' id='" . $this->getName() . "' value='" . $this->_value . "' ";
        if ($this->getClass() != '' || $this->_type = 'submit') {
            if ($this->_type = 'submit') {
                $ret .= "class='formButton' ";
            } else {
                $ret .= "class='" . $this->getClass() . "' ";
            }
        }

        $ret .= $this->getExtra() . '>';

        return $ret;
    }
}

/**
 * Creación de Campos Checkbox
 */
class RMCheck extends RMFormElement
{
    public $_options = array();

    public function __construct($caption)
    {
        $this->setCaption($caption);
    }

    public function addOption($caption, $name, $value, $state = 0)
    {
        $rtn              = array();
        $rtn['caption']   = $caption;
        $rtn['value']     = $value;
        $rtn['state']     = $state;
        $rtn['name']      = $name;
        $this->_options[] = $rtn;
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function render()
    {
        $rtn = '';
        foreach ($this->_options as $k => $v) {
            $rtn .= "<input type='checkbox' name='$v[name]' id='$v[name]' value='$v[value]' ";
            if ($v['state'] == 1) {
                $rtn .= 'checked ';
            }
            $rtn .= "> $v[caption]<br>";
        }

        return $rtn;
    }
}

/**
 * Creación de campos Rasio
 */
class RMRadio extends RMFormElement
{
    public $_options = array();
    public $_break;

    public function __construct($caption, $name, $salto = 0)
    {
        $this->setCaption($caption);
        $this->setName($name);
        if ($salto == 0) {
            $this->_break = '<br>';
        } else {
            $this->_break = '&nbsp;&nbsp;';
        }
    }

    public function addOption($caption, $value, $state = 0)
    {
        $rtn              = array();
        $rtn['caption']   = $caption;
        $rtn['value']     = $value;
        $rtn['state']     = $state;
        $this->_options[] = $rtn;
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function render()
    {
        $rtn = '';
        foreach ($this->_options as $k => $v) {
            $rtn .= "<input name='" . $this->getName() . "' id='" . $this->getName() . "' type='radio' value='$v[value]' ";
            if ($v['state'] == 1) {
                $rtn .= 'checked ';
            }
            $rtn .= "> $v[caption]" . $this->_break;
        }

        return $rtn;
    }
}

/**
 * Creación de campos Rasio
 */
class RMYesNo extends RMFormElement
{
    public $_value = 1;

    public function __construct($caption, $name, $value = 1)
    {
        $this->setCaption($caption);
        $this->setName($name);
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function setValue($value)
    {
        $this->_value = $value;
    }

    public function render()
    {
        $rtn = "<input name='" . $this->getName() . "' id='" . $this->getName() . "' type='radio' value='1' ";
        if ($this->_value == 1) {
            $rtn .= 'checked ';
        }
        $rtn .= '> ' . _YES . ' &nbsp;';
        $rtn .= "<input name='" . $this->getName() . "' id='" . $this->getName() . "' type='radio' value='0' ";
        if ($this->_value == 0) {
            $rtn .= 'checked ';
        }
        $rtn .= '> ' . _NO . ' &nbsp;';

        return $rtn;
    }
}
