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

	public function get_cells()
	{
		$c_c = Cell::get_coords_by_id($this->current_cell);
		$x = $c_c[0];
		$y = $c_c[1];

		$i = 1;
		$c = $sw = $nw = $se = $ne = 0;
		while ($c < 1)
		{
			if ($x - $i >= 0 && $y - $i >= 0 && $sw == 0)
			{
				$c_id = Cell::get_id_by_cords($x - $i, $y - $i);
				$this->check_cell('attack', $x - $i, $y - $i);
				$this->check_cell('cast', $x - $i, $y - $i);
				if (!Cell::is_free($c_id))
					$sw++;
			}
			else
			{
				$sw++;
			}

			if ($x - $i >= 0 && $y + $i <= 7 && $nw == 0)
			{
				$c_id = Cell::get_id_by_cords($x - $i, $y + $i);
				$this->check_cell('attack', $x - $i, $y + $i);
				$this->check_cell('cast', $x - $i, $y + $i);
				if (!Cell::is_free($c_id))
					$nw++;
			}
			else
			{
				$nw++;
			}

			if ($x + $i <= 7 && $y - $i >= 0 && $se == 0)
			{
				$c_id = Cell::get_id_by_cords($x + $i, $y - $i);
				$this->check_cell('attack', $x + $i, $y - $i);
				$this->check_cell('cast', $x + $i, $y - $i);
				if (!Cell::is_free($c_id))
					$se++;
			}
			else
			{
				$se++;
			}

			if ($x + $i <= 7 && $y + $i <= 7 && $ne == 0)
			{
				$c_id = Cell::get_id_by_cords($x + $i, $y + $i);
				$this->check_cell('attack', $x + $i, $y + $i);
				$this->check_cell('cast', $x + $i, $y + $i);
				if (!Cell::is_free($c_id))
					$ne++;
			}
			else
			{
				$ne++;
			}

			if ($sw > 0 && $nw > 0 && $se > 0 && $sw > 0)
				$c++;
			$i++;
		}

		foreach ($this->move_cells as $c_id)
		{
			if (!in_array($c_id, $this->available_cells))
				$this->available_cells[] = $c_id;
		}
		foreach ($this->attack_cells as $c_id)
		{
			if (!in_array($c_id, $this->available_cells))
				$this->available_cells[] = $c_id;
		}
		foreach ($this->cast_cells as $c_id)
		{
			if (!in_array($c_id, $this->available_cells))
				$this->available_cells[] = $c_id;
		}
	}

	public function check_cell(string $type, int $x, int $y)
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
					return true;
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
				else
				{
					if (!in_array($c_id, $this->move_cells))
						$this->move_cells[] = $c_id;
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