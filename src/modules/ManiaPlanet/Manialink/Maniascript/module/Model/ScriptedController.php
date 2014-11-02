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

namespace Maniaplanet\Manialink\Maniascript\module\Model;

/**
 * Class ScriptedController
 *
 * @package Manialink\Maniascript\module\Model
 *
 * @method void addScript(Script $script)
 */
abstract class ScriptedController extends \OWeb\types\Controller{

    /**
     * Creating a controller for OWeb
     *
     * @param bool $primary Is this the primary Controller
     */
    function __construct($primary = false)
    {
        parent::__construct($primary);

        $this->addDependance('Manialink\Maniascript\module\Extension\Header');
    }

    /**
     * @param String $header
     * @param int    $type
     * @param String $key
     *
     * @deprecated
     */
    public function addHeader($header, $type = -1, $key = null){ }
} 