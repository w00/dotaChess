<?php
/**
 * @author w00
 * @copyright 2014
 * @tutorial Шахматная фигура
 */

/**
 * Figure
 * 
 * @package DotaChess
 * @author w00der
 * @copyright 2014
 * @version $Id$
 * @access public
 */
class Figure
{
	public $id;
	public $color; // цвет фигуры
	public $type; // тип фигуры - пешка, тура, офицер...
	public $sub_type; // подтип фигуры - черный офицер...
	public $current_cell; // текущая клетка фигуры
	public $available_cells = array(); // клетки в которые фигура может пойти или ударить
	public $attack_cells = array(); // клетки в которые можно выстрелить
	public $move_cells = array(); // клетки которые можно захватить, забрав фигуру
	public $cast_cells = array(); // клетки в которые можно кастовать
	public $health_size; // здоровье
	public $attack_size; // атака
	public $shield_size; // щит/прикрывание/броня
	public $honor_size; // отвага/храбрость
	public $cast_type; // магия
	public $status_shot = false; // статус стреляла ли фигура
	public $status_cast = false; // статус кастовала ли фигура
	public $status_on_attack = array(); // статус из каких клеток есть угроза. Массив ид-ров (номеров) клеток
	public $status_cover = array(); // статус какие клетки закрывает. Например, от шаха королю.
	public $status_shield = array(); // статус от каких клеток прикрытие. 


	public function make_move($to, $type)
	{
		
	}

	public function move($to)
	{
		
	}

	public function attack($to, $type)
	{
		
	}

	public function cast($to, $type)
	{
		
	}


	public function add_shield($from, $to, $size)
	{
		$of = $this->get_figure($from);
		$ot = $this->get_figure($to);
		$ot->shield_size = $ot->shield_size + $size;
		if (!in_array($from, $ot->status_shield))
			$ot->status_shield[] = $from;
		if (!in_array ($to, $of->status_cover))
			$of->status_cover[] = $to;
	}
}

?>