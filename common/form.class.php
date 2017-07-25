<?php
/*******************************************************************
 *
 * ----------------------------------------------------------       *
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
 * ----------------------------------------------------------       *
 * form.class.php:                                                  *
 * Clase para el control de Formularios                             *
 * ----------------------------------------------------------       *
 * @copyright : © 2006. BitC3R0.                                     *
 * @autor     : BitC3R0                                                  *
 * @paquete   : Archivo PHP                                            *
 * @modificado: 24/05/2006 12:44:52 a.m.                            *
 *******************************************************************/

include XOOPS_ROOT_PATH . '/modules/portfolio/common/formelement.class.php';
include XOOPS_ROOT_PATH . '/modules/portfolio/common/formtexts.class.php';
include XOOPS_ROOT_PATH . '/modules/portfolio/common/formdates.class.php';

class RMForm
{
    public $_fields = array();
    public $_name   = '';
    public $_action = '';
    public $_extra  = '';
    public $_method = '';
    public $_title  = '';

    /**
     * Función inicializadora
     * @param        $title
     * @param        $name
     * @param        $action
     * @param string $method
     */
    public function __construct($title, $name, $action, $method = 'post')
    {
        $this->_name   = $name;
        $this->_action = $action;
        $this->_method = $method;
        $this->_title  = $title;
    }

    /**
     * Agregar un nuevo campo de texto
     * @param $extra
     */
    public function setExtra($extra)
    {
        $this->_extra = $extra;
    }

    public function getExtra()
    {
        return $this->_extra;
    }

    public function setMehod($method)
    {
        if ($method === 'post' || $method === 'get') {
            $this->_method = $method;
        }
    }

    public function setName($name)
    {
        $this->_name = trim($name);
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setAction($action)
    {
        $this->_action = $action;
    }

    public function getAction()
    {
        return $this->_action;
    }

    /**
     * Agregamos nuevos elementos
     * Estos elementos son instanacias de algun elemento de formulario
     * @param $element
     */
    public function addElement(&$element)
    {
        $this->_fields[] = $element;
    }

    /**
     * Devolvemos el codigo HTML
     */
    public function render()
    {
        $ret = "<form name='" . $this->_name . "' id='" . $this->_name . "' action='" . $this->_action . "' method='" . $this->_method . "' " . $this->_extra . ">
                <table width='100%' class='outer' cellspacing='1'>
                    <tr><th colspan='2'>" . $this->_title . '</th></tr>';

        foreach ($this->_fields as $element) {
            if (is_a($element, 'RMSubTitle') || is_a($element, 'RMHidden')) {
                $ret .= $element->render();
            } else {
                $ret .= "<tr align='left' class='even'><td class='even'>" . $element->getCaption();
                if ($element->getDescription() != '') {
                    $ret .= "<br><br><span style='font-size: 10px;'>" . $element->getDescription() . '</span></td>';
                }
                $ret .= '<td>' . $element->render() . '</td></tr>';
            }
        }

        $ret .= '</table></form>';

        return $ret;
    }

    /**
     * Escribe el contenido HTML
     */
    public function display()
    {
        echo $this->render();
    }
}
