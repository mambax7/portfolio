<?php
/*******************************************************************
 *
 * ----------------------------------------------------             *
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
 * ----------------------------------------------------             *
 * menu.php:                                                        *
 * Men� para la secci�n administrativa                              *
 * ----------------------------------------------------             *
 * @copyright : � 2006. BitC3R0.                                     *
 * @autor     : BitC3R0                                                  *
 * @paquete   : RMSOFT MyFolder v1.0                                   *
 * @modificado: 24/05/2006 12:38:10 a.m.                            *
 *******************************************************************/

$moduleDirName = basename(dirname(__DIR__));

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}
$adminObject = \Xmf\Module\Admin::getInstance();

$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
//$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

$moduleHelper->loadLanguage('modinfo');

$i                      = 1;
$adminmenu[$i]['title'] = _MI_PORTFOLIO_AM0;
$adminmenu[$i]['link']  = 'admin/index.php';
$adminmenu[$i]['icon']  = $pathIcon32 . '/home.png';
++$i;
$adminmenu[$i]['title'] = _MI_PORTFOLIO_AM3;
$adminmenu[$i]['link']  = 'admin/categos.php';
$adminmenu[$i]['icon']  = $pathIcon32 . '/category.png';
//++$i;
//$adminmenu[$i]['title'] = _MI_PORTFOLIO_AM4;
//$adminmenu[$i]['link'] = "admin/categos.php?op=new";
//$adminmenu[$i]['icon'] = $pathIcon32.'/categoryadd.png';
++$i;
$adminmenu[$i]['title'] = _MI_PORTFOLIO_AM1;
$adminmenu[$i]['link']  = 'admin/main.php';
$adminmenu[$i]['icon']  = $pathIcon32 . '/manage.png';
//++$i;
//$adminmenu[$i]['title'] = _MI_PORTFOLIO_AM2;
//$adminmenu[$i]['link'] = "admin/main.php?op=new";
//$adminmenu[$i]['icon'] = $pathIcon32.'/insert_table_row.png';
++$i;
$adminmenu[$i]['title'] = _MI_PORTFOLIO_ABOUT;
$adminmenu[$i]['link']  = 'admin/about.php';
$adminmenu[$i]['icon']  = $pathIcon32 . '/about.png';
