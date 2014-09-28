<?php
/**
 * @author w00
 * @copyright 2014
 * @tutorial Слон
 */

/**
 * Bishop
 * 
 * @package DotaChess
 * @author w00der
 * @copyright 2014
 * @version $Id$
 * @access public
 */
class Bishop extends Figure
{
	public $type = 'Bishop';
	public $sub_type;

	public function get_moves()
	{
		// x - a, b, c, d ... h
		// y - 1, 2, 3, 4 ... 8
		$c_coords = Cell::get_coords_by_id($this->current_cell);
		$c_x = $c_coords[0];
		$c_y = $c_coords[1];
		$p_x = $c_x - 1;
		$i = 0;
		while ($p_x >= 0)
		{
			
			$p_x--;
		}
		if ($this->color = 0)
		{
			$this->add_move_cell(0, -1); // Изменения по x и y
		}
		else
		{
			$this->add_move_cell(0, 1); // Изменения по x и y
		}
	}

	public function get_attacks()
	{
		if ($this->color = 0)
		{
			$this->add_attack_cell(-1, -1); // Изменения по x и y
			$this->add_attack_cell(1, -1);
		}
		else
		{
			$this->add_attack_cell(-1, 1); // Изменения по x и y
			$this->add_attack_cell(1, 1);
		}
	}

	public function get_casts()
	{
		if ($this->color = 0)
		{
			$this->add_cast_cell(-1, -1); // Изменения по x и y
			$this->add_cast_cell(1, -1);
		}
		else
		{
			$this->add_cast_cell(-1, 1); // Изменения по x и y
			$this->add_cast_cell(1, 1);
		}
	}
}
?>