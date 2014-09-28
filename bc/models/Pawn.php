<?php
/**
 * @author w00
 * @copyright 2014
 * @tutorial Пешка
 */

/**
 * Pawn
 * 
 * @package DotaChess
 * @author w00der
 * @copyright 2014
 * @version $Id$
 * @access public
 */
class Pawn extends Figure
{
	public $type = 'Pawn';
	public $steps = 0;

	public function get_cells()
	{
		$c_c = Cell::get_coords_by_id($this->current_cell);
		$x = $c_c[0];
		$y = $c_c[1];
		if ($this->color = 0)
		{
			$this->check_cell('move', $x, $y - 1);
			$this->check_cell('attack', $x - 1, $y - 1);
			$this->check_cell('attack', $x + 1, $y - 1);
			$this->check_cell('cast', $x - 1, $y - 1);
			$this->check_cell('cast', $x + 1, $y - 1);
		}
		else
		{
			$this->check_cell('move', $x, $y + 1);
			$this->check_cell('attack', $x - 1, $y + 1);
			$this->check_cell('attack', $x + 1, $y + 1);
			$this->check_cell('cast', $x - 1, $y + 1);
			$this->check_cell('cast', $x + 1, $y + 1);
		}
	}

	public function check_cell($type, $x, $y)
	{
		if (Cell::is_exist($x, $y))
		{
			$c_id = Cell::get_id_by_cords($x, $y);
			if ($type == 'move')
			{
				if (Cell::is_free($c_id))
				{
					if (!in_array($c_id, $this->move_cells))
						$this->move_cells[] = $c_id;
				}
			}
			elseif ($type == 'attack')
			{
				if (!Cell::is_free($c_id))
				{
					$obj = Cell::get_figure($c_id);
					if ($obj->color != $this->color)
					{
						if ($obj->health_size > $this->attack_size)
						{
							if (!in_array($c_id, $this->attack_cells))
								$this->attack_cells[] = $c_id;
						}
						else
						{
							if (!in_array($c_id, $this->attack_cells))
								$this->attack_cells[] = $c_id;
							if (!in_array($c_id, $this->move_cells))
								$this->move_cells[] = $c_id;
						}
					}
					else
					{
						$this->add_shield($this->current_cell, $c_id, $size);
					}
				}
			}
			elseif ($type == 'cast')
			{
				if (!Cell::is_free($c_id))
				{
					if (!in_array($c_id, $this->cast_cells))
						$this->cast_cells[] = $c_id;
				}
			}
		}
	}

}
?>