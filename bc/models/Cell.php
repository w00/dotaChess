<?php
/**
 * @author w00
 * @copyright 2014
 * @tutorial Клетка шахматной доски
 */

/**
 * Cell
 * 
 * @package DotaChess
 * @author w00der
 * @copyright 2014
 * @version $Id$
 * @access public
 */
class Cell
{
	public $board_id; // ид-р доски
	public $id; // ид-р (номер) клетки по порядку от 0 до 63
	public $x; // координата клетки по х
	public $y; // координата клетки по у
	public $color; // цвет клетки
	public $figure; // экземпляр или ид-р фигуры (зависит от контекста вызова класса)
	public $statuses = array(); // статусы клетки.

	public static function get_coords_by_id(int $id)
	{
		if ($id >= 0 && $id <= 63)
		{
			// x - a, b, c, d ... h
			// y - 1, 2, 3, 4 ... 8
			$y = floor(($id+1)/8);
			$x = ($id-1) - ($y*8);
			return array($x, $y);
		}
		else
		{
			return false;
		}
	}

	public static function get_id_by_cords(int $x, int $y)
	{
		if (($x >= 0 && $x <= 7) && ($y >= 0 && $y <= 7))
		{
			$id = ($y*8) + $x + 1;
			return $id;
		}
		else
		{
			return false;
		}
	}

	public static function is_free(int $id)
	{
		$obj = new Cell($id);
		if (!$obj->figure)
			return true;
		return false;
	}

	public static function get_figure(int $id)
	{
		$obj = new Cell($id);
		if (!$obj->figure)
			return false;
		return $obj->figure;
	}

	public static function is_exist(int $x, int $y)
	{
		if (($x >= 0 && $x <= 7) && ($y >= 0 && $y <= 7))
			return true;
		return false;
	}

}

?>