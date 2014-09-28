<?php
/**
 * @author w00
 * @copyright 2014
 * @tutorial Шахматная игра
 */

/**
 * Game
 * 
 * @package DotaChess
 * @author w00der
 * @copyright 2014
 * @version $Id$
 * @access public
 */
class Game
{
	public $id; // ид-р игры на сервере
	public $white_id; // ид-р игрока1
	public $black_id; // ид-р игрока2
	public $history; // экземпляр класса Истории
	public $options; // экземпляр класса Опции игры
	public $board; // экземпляр класса Доска
	public $available_figs = array(); //
	public $beaten_figs = array(); //

	public static function get_game($id, $step)
	{
		
	}
}

?>