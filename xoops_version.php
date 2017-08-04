<?php
/*******************************************************************
 *
 * ----------------------------------------------------             *
 * RMSOFT MyFolder 1.0                                              *
 * M�dulo para el manejo de un portafolio profesional               *
 * CopyRight � 2006. Red M�xico Soft                                *
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
 * view.php:                                                        *
 * Informaci�n completa de un trabajo                               *
 * ----------------------------------------------------             *
 * @copyright : � 2006. BitC3R0.                                     *
 * @autor     : BitC3R0                                                  *
 * @paquete   : RMSOFT GS 2.0                                          *
 * @modificado: 24/05/2006 12:52:24 a.m.                            *
 *******************************************************************/

$modversion['version']             = '1.32';
$modversion['module_status']       = 'Beta 1';
$modversion['release_date']        = '2017/07/23';
$modversion['name']                = 'Portfolio';
$modversion['description']         = _MI_PORTFOLIO_MODDESC;
$modversion['author']              = 'BitC3R0';
$modversion['credits']             = 'Sato-san, Mamba';
$modversion['help']                = 'page=help';
$modversion['license']             = 'GNU GPL 2.0';
$modversion['license_url']         = 'www.gnu.org/licenses/gpl-2.0.html';
$modversion['official']            = 0;  //1 indicates supported by Xoops CORE Dev Team, 0 means 3rd party supported
$modversion['image']               = 'assets/images/logoModule.png';
$modversion['dirname']             = basename(__DIR__);
$modversion['module_website_url']  = 'https://xoops.org';
$modversion['module_website_name'] = 'XOOPS';
$modversion['author_website_url']  = 'http://redmexico.com.mx';
$modversion['author_website_name'] = 'Red México Soft';
$modversion['min_php']             = '5.5';
$modversion['min_xoops']           = '2.5.9';
$modversion['min_admin']           = '1.2';
$modversion['min_db']              = array('mysql' => '5.5');
$modversion['min_admin']           = '1.1';
$modversion['modicons16'] = 'assets/images/icons/16';
$modversion['modicons32'] = 'assets/images/icons/32';

//Archivo SQL
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Admin things
$modversion['hasAdmin']    = 1;
$modversion['adminindex']  = 'admin/index.php';
$modversion['adminmenu']   = 'admin/menu.php';
$modversion['system_menu'] = 1;

// Menu Principal
$modversion['hasMain'] = 1;

//Tablas creadas
$modversion['tables'][0] = 'portfolio_categos';
$modversion['tables'][1] = 'portfolio_works';
$modversion['tables'][2] = 'portfolio_images';

// Templates del Modulo
$modversion['templates'][1]['file']        = 'portfolio_index.tpl';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file']        = 'portfolio_categos.tpl';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file']        = 'portfolio_view.tpl';
$modversion['templates'][3]['description'] = '';

// ------------------- Help files ------------------- //
$modversion['helpsection'] = array(
    ['name' => _MI_PORTFOLIO_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_PORTFOLIO_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_PORTFOLIO_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_PORTFOLIO_SUPPORT, 'link' => 'page=support'],
);
// Blocks
$modversion['blocks'][1]['file']        = 'portfolio_recent.php';
$modversion['blocks'][1]['name']        = _MI_PORTFOLIO_BKRECENT;
$modversion['blocks'][1]['description'] = '';
$modversion['blocks'][1]['show_func']   = 'portfolio_bk_recent';
$modversion['blocks'][1]['edit_func']   = 'portfolio_bk_recent_edit';
$modversion['blocks'][1]['options']     = '3';
$modversion['blocks'][1]['template']    = 'portfolio_bk_recent.tpl';

$modversion['blocks'][2]['file']        = 'portfolio_recent.php';
$modversion['blocks'][2]['name']        = _MI_PORTFOLIO_BKCOMMENTS;
$modversion['blocks'][2]['description'] = '';
$modversion['blocks'][2]['show_func']   = 'portfolio_bk_comments';
$modversion['blocks'][2]['edit_func']   = 'portfolio_bk_comments_edit';
$modversion['blocks'][2]['options']     = '2';
$modversion['blocks'][2]['template']    = 'portfolio_bk_comments.tpl';

$modversion['blocks'][3]['file']        = 'portfolio_recent.php';
$modversion['blocks'][3]['name']        = _MI_PORTFOLIO_BKFATURED;
$modversion['blocks'][3]['description'] = '';
$modversion['blocks'][3]['show_func']   = 'portfolio_bk_featured';
$modversion['blocks'][3]['edit_func']   = 'portfolio_bk_featured_edit';
$modversion['blocks'][3]['options']     = '3';
$modversion['blocks'][3]['template']    = 'portfolio_bk_featured.tpl';

// Tipo de Editor
xoops_load('XoopsEditorHandler');
$editorHandler = XoopsEditorHandler::getInstance();
$editorList    = array_flip($editorHandler->getList());

$modversion['config'][1]['name']        = 'editor';
$modversion['config'][1]['title']       = '_MI_PORTFOLIO_EDITOR';
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype']    = 'select';
$modversion['config'][1]['valuetype']   = 'text';
$modversion['config'][1]['default']     = 'dhtml';
$modversion['config'][1]['options']     = $editorList;

$modversion['config'][2]['name']        = 'dates';
$modversion['config'][2]['title']       = '_MI_PORTFOLIO_FORMATDATE';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype']    = 'textbox';
$modversion['config'][2]['valuetype']   = 'text';
$modversion['config'][2]['default']     = 'd/m/Y';

$modversion['config'][3]['name']        = 'imgw';
$modversion['config'][3]['title']       = '_MI_PORTFOLIO_IMGW';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype']    = 'textbox';
$modversion['config'][3]['valuetype']   = 'int';
$modversion['config'][3]['default']     = 450;

$modversion['config'][4]['name']        = 'imgh';
$modversion['config'][4]['title']       = '_MI_PORTFOLIO_IMGH';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype']    = 'textbox';
$modversion['config'][4]['valuetype']   = 'int';
$modversion['config'][4]['default']     = 450;

$modversion['config'][5]['name']        = 'thw';
$modversion['config'][5]['title']       = '_MI_PORTFOLIO_THW';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype']    = 'textbox';
$modversion['config'][5]['valuetype']   = 'int';
$modversion['config'][5]['default']     = 100;

$modversion['config'][6]['name']        = 'thh';
$modversion['config'][6]['title']       = '_MI_PORTFOLIO_THH';
$modversion['config'][6]['description'] = '';
$modversion['config'][6]['formtype']    = 'textbox';
$modversion['config'][6]['valuetype']   = 'int';
$modversion['config'][6]['default']     = 100;

$modversion['config'][7]['name']        = 'imgnum';
$modversion['config'][7]['title']       = '_MI_PORTFOLIO_IMGSNUM';
$modversion['config'][7]['description'] = '';
$modversion['config'][7]['formtype']    = 'select';
$modversion['config'][7]['valuetype']   = 'int';
$modversion['config'][7]['default']     = 5;
$modversion['config'][7]['options']     = array(
    '1'  => 1,
    '2'  => 2,
    '3'  => 3,
    '4'  => 4,
    '5'  => 5,
    '6'  => 6,
    '7'  => 7,
    '8'  => 8,
    '9'  => 9,
    '10' => 10
);

$modversion['config'][8]['name']        = 'storedir';
$modversion['config'][8]['title']       = '_MI_PORTFOLIO_STORE';
$modversion['config'][8]['description'] = '_MI_PORTFOLIO_STORE_DESC';
$modversion['config'][8]['formtype']    = 'textbox';
$modversion['config'][8]['valuetype']   = 'text';
$modversion['config'][8]['default']     = XOOPS_ROOT_PATH . '/modules/portfolio/uploads/';

$modversion['config'][9]['name']        = 'title';
$modversion['config'][9]['title']       = '_MI_PORTFOLIO_TITLE';
$modversion['config'][9]['description'] = '';
$modversion['config'][9]['formtype']    = 'textbox';
$modversion['config'][9]['valuetype']   = 'text';
$modversion['config'][9]['default']     = 'Portfolio';

$modversion['config'][10]['name']        = 'recents';
$modversion['config'][10]['title']       = '_MI_PORTFOLIO_RECENTSNUM';
$modversion['config'][10]['description'] = '_MI_PORTFOLIO_RECENTSNUM_DESC';
$modversion['config'][10]['formtype']    = 'textbox';
$modversion['config'][10]['valuetype']   = 'int';
$modversion['config'][10]['default']     = 5;

$modversion['config'][11]['name']        = 'featured';
$modversion['config'][11]['title']       = '_MI_PORTFOLIO_FEATUREDNUM';
$modversion['config'][11]['description'] = '';
$modversion['config'][11]['formtype']    = 'textbox';
$modversion['config'][11]['valuetype']   = 'int';
$modversion['config'][11]['default']     = 5;

$modversion['config'][12]['name']        = 'results';
$modversion['config'][12]['title']       = '_MI_PORTFOLIO_WORKSNUM';
$modversion['config'][12]['description'] = '';
$modversion['config'][12]['formtype']    = 'textbox';
$modversion['config'][12]['valuetype']   = 'int';
$modversion['config'][12]['default']     = 5;
