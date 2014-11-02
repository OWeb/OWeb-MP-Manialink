<?php
/**
 * @author      Oliver de Cramer (oliverde8 at gmail.com)
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

namespace Maniaplanet\Manialink\Maniascript\module\Extension;

use Manialink\Maniascript\module\Model\Script;
use OWeb\OWeb;
use OWeb\types\extension\Extension;
use ManiaLib\Manialink\Elements\Manialink;


class Header extends Extension{

    /**
     * @var Dispatcher
     */
    private $eventM;

    /** @var Script[] */
    private $scripts = array();

    protected function init()
    {
        $this->eventM = OWeb::getInstance()->getManageEvents();
        $this->addAlias("addScript", "addScript");
    }

    protected function ready()
    {
        // TODO: Implement ready() method.
    }

    public function addScript(Script $script) {
        $this->scripts[] = $script;
    }

    public function appendScripts(Manialink $ml){
        foreach ($this->scripts as $script) {
            \ManiaLib\Manialink\Elements\Script::create()->setNodeValue($script->getScript())->appendTo($ml);
        }
    }
}