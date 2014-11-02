<?php
/**
 * @author       Oliver de Cramer (oliverde8 at gmail.com)
 * @copyright    GNU GENERAL PUBLIC LICENSE
 *                     Version 3, 29 June 2007
 *
 * PHP version 5.3 and above
 *
 * LICENSE: This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see {http://www.gnu.org/licenses/}.
 */

namespace Maniaplanet\Manialink\displayMode\module\Extension;

use ManiaLib\Manialink\Elements\Manialink;
use ManiaLib\Manialink\Elements\Timeout;
use ManiaLib\XML\Fragment;
use ManiaLib\XML\Rendering\Renderer;
use Manialink\Maniascript\module\Extension\Header;
use OWeb\abs\displayMode\module\Extension\AbstractTemplate;
use OWeb\OWeb;

/**
 * Handles the incoming parameters to display a manialink page.
 *
 * @package OWeb\web\displayMode\module\Extension
 */
class Template extends AbstractTemplate
{
    /** @var  Header */
    private $scripts;

    protected function init()
    {
        parent::init();
        $this->addDependance('Manialink\Maniascript\module\Extension\Header');
    }

    protected function ready()
    {
        parent::ready();
        $this->scripts = OWeb::getInstance()->getManageExtensions()->getExtension('Manialink\Maniascript','Header');
    }

    public function prepareDisplay($tmp = 'main')
    {
        //First we prepare the page
        $this->_prepareDisplay();

        //Then display the template
        ob_start();

        //try{
        //Including The template
        include OWEB_DIR_TEMPLATES."/".$tmp.".php";

        $foo = ob_get_contents();
        //Clean
        ob_end_clean();

        $ml = new Manialink();
        $ml->setVersion(2);

        Timeout::create()
            ->setNodeValue(0)
            ->appendTo($ml);

        Fragment::create()->setNodeValue($foo)->appendTo($ml);
        $this->scripts->appendScripts($ml);

        header('Content-Type: application/xml; charset=utf-8');
        $renderer = new Renderer();
        $renderer->setRoot($ml);
        echo $renderer->getXML();
    }

    public function addHeader($header, $type = -1, $key = null){
    }

    public function addScript($script)
    {
        $this->scripts->addScript($script);
    }
}