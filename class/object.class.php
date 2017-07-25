<?php

/*******************************************************************
 *
 * ------------------------------------------------------------     *
 * RMSOFT MyFolder 1.0                                              *
 * M�dulo para el manejo de un portafolio profesional               *
 * CopyRight � 2006. RMSOFT                                *
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
 * ------------------------------------------------------------     *
 * object.class.php:                                                *
 * Clase base para los objetos del m�dulo                           *
 * ------------------------------------------------------------     *
 * @copyright : � 2006. BitC3R0.                                     *
 * @autor     : BitC3R0                                                  *
 * @paquete   : RMSOFT MyFolder v1.0                                   *
 * @modificado: 24/05/2006 12:41:41 a.m.                            *
 *******************************************************************/
class MFObject extends XoopsObject
{
    public $vars    = array();
    public $db      = null;
    public $_isNew  = false;
    public $_errors = array();

    /**
     * Inicializa variables
     * @param string $name
     * @param null   $value
     * @param bool   $required
     */
    public function initVar($name, $value = null, $required = false)
    {
        $this->vars[$name] = array('value' => $value, 'required' => $required);
    }

    /**
     * Establece el valor de una variable
     * @param string $name
     * @param mixed  $value
     */
    public function setVar($name, $value)
    {
        if (isset($this->vars[$name])) {
            $this->vars[$name]['value'] = $value;
        }
    }

    /**
     * Establece varias variables de una vez
     * @param array $arrVars
     */
    public function setVars($arrVars)
    {
        if (!is_array($arrVars)) {
            return;
        }

        foreach ($arrVars as $k => $v) {
            $this->setVar($k, $v);
        }
    }

    /**
     * Devuelve una variable de nuestro array de variables
     * @param string $name
     * @param int    $value_type Indica el formato del tipo a devolver
     *                           0 = Valor normal, 1 = Cadena filtrada
     * @return mixed
     */
    public function getVar($name, $value_type = 0)
    {
        if (!isset($this->vars[$name])) {
            return;
        }
        switch ($value_type) {
            case 1: // Formateado
                $myts = MyTextSanitizer::getInstance();

                return $myts->displayTarea($this->vars[$name]['value']);
            case 2: // Para guardare
                $myts = MyTextSanitizer::getInstance();

                return $myts->makeTareaData4Save($this->vars[$name]['value']);
            case 3: // Plano, sin HTML no XoopsCode
                $myts = MyTextSanitizer::getInstance();

                return $myts->displayTarea($this->vars[$name]['value'], 0, 0);
            case 4: // Para editar
                $myts = MyTextSanitizer::getInstance();

                return $myts->htmlSpecialChars($this->vars[$name]['value'], 0, 0);
            case 0:
            default:
                return $this->vars[$name]['value'];
                break;
        }
    }

    /**
     * Devuelve un array asociativo con los valores
     * de las variables
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * Inicializamos un objeto nuevo
     */
    public function setNew()
    {
        $this->_isNew = true;
    }

    public function unsetNew()
    {
        $this->_isNew = false;
    }

    public function isNew()
    {
        return $this->_isNew;
    }

    /**
     * Creamos los errores
     * @param $text
     */
    public function addError($text)
    {
        $this->_errors[] = $text;
    }

    /**
     * Obtenemos los errores
     * @param bool $html
     * @return string|void
     */
    public function errors($html = true)
    {
        $ret = '';

        if (count($this->_errors) <= 0) {
            return;
        }

        if ($html) {
            $ret .= "<div class='outer' style='padding: 1px;'>";
            foreach ($this->_errors as $k) {
                $ret .= "<div class='odd'>$k</div>";
            }
            $ret .= '</div>';
        } else {
            foreach ($this->_errors as $k) {
                $ret .= $k . '<br>';
            }
        }

        return $ret;
    }
}
