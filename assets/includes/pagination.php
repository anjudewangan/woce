<?php

class Pagination
{
	/**
	 * Current Page
	 *
	 * @var integer
	 */
	var $page;

	/**
	 * Size of the records per page
	 *
	 * @var integer
	 */
	var $size;

	/**
	 * Total records
	 *
	 * @var integer
	 */
	var $total_records;

	/**
	 * Link used to build navigation
	 *
	 * @var string
	 */
	var $link;

	/**
	 * Class Constructor
	 *
	 * @param integer $page
	 * @param integer $size
	 * @param integer $total_records
	 */
	function Pagination_number($page = null, $size = null, $total_records = null)
	{
		$this->page = $page;
		$this->size = $size;
		$this->total_records = $total_records;
	}

	/**
	 * Set's the current page
	 *
	 * @param unknown_type $page
	 */
	function setPage($page)
	{
		$this->page = 0 + $page;
	}

	/**
	 * Set's the records per page
	 *
	 * @param integer $size
	 */
	function setSize($size)
	{
		$this->size = 0 + $size;
	}

	/**
	 * Set's total records
	 *
	 * @param integer $total
	 */
	function setTotalRecords($total)
	{
		$this->total_records = 0 + $total;
	}

	/**
	 * Sets the link url for navigation pages
	 *
	 * @param string $url
	 */
	function setLink($url)
	{
		$this->link = $url;
	}

	/**
	 * Returns the LIMIT sql statement
	 *
	 * @return string
	 */
	function getLimitSql()
	{
		$sql = "LIMIT " . $this->getLimit();
		return $sql;
	}

	/**
	 * Get the LIMIT statment
	 *
	 * @return string
	 */
	function getLimit()
	{
		if ($this->total_records == 0) {
			$lastpage = 0;
		} else {
			$lastpage = ceil($this->total_records / $this->size);
		}

		$page = $this->page;

		if ($this->page < 1) {
			$page = 1;
		} else if ($this->page > $lastpage && $lastpage > 0) {
			$page = $lastpage;
		} else {
			$page = $this->page;
		}

		$sql = ($page - 1) * $this->size . "," . $this->size;

		return $sql;
	}

	/**
	 * Creates page navigation links
	 *
	 * @return 	string
	 */
	function create_links()
	{
		global $lang_paging_next, $lang_paging_previous;

		$totalItems = $this->total_records;
		$perPage = $this->size;
		$currentPage = $this->page;
		$link = $this->link;

		$totalPages = floor($totalItems / $perPage);
		$totalPages += ($totalItems % $perPage != 0) ? 1 : 0;

		if ($totalPages < 1 || $totalPages == 1) {
			return null;
		}

		$output = null;

		$loopStart = 1;
		$loopEnd = $totalPages;

		if ($totalPages > 5) {

			if ($currentPage <= 3) {
				$loopStart = 1;
				$loopEnd = 5;
			} else if ($currentPage >= $totalPages - 2) {
				$loopStart = $totalPages - 4;
				$loopEnd = $totalPages;
			} else {
				$loopStart = $currentPage - 2;
				$loopEnd = $currentPage + 2;
			}
		}

		if ($currentPage > 1) {
			$aa = $currentPage - 1;
			$output .= sprintf('<li
			class="moto-pagination-item moto-pagination-item-control moto-pagination-item-control_last">
			<a href="' . $link . '" class="moto-pagination-link"><i
					class="moto-pagination-link-icon moto-pagination-link-text fa fa-angle-double-left"></i></a>
		</li> ', $currentPage - 1);
		}

		for ($i = $loopStart; $i <= $loopEnd; $i++) {
			if ($i == $currentPage) {
				$output .= '<li class="moto-pagination-item moto-pagination-item-page">
				<span class="moto-pagination-link moto-pagination-link_active"><span
						class="moto-pagination-link-text">' . $i . '</span></span></li>';
			} else {
				$output .= sprintf('<li class="moto-pagination-item moto-pagination-item-page">
				<a href="' . $link . '" class="moto-pagination-link"><span
						class="moto-pagination-link-text">', $i) . $i . '</span></a></li>';
			}
		}

		if ($currentPage < $totalPages) {
			$aa = $currentPage + 1;
			$output .= sprintf('<li
			class="moto-pagination-item moto-pagination-item-control moto-pagination-item-control_last">
			<a href="' . $link . '" class="moto-pagination-link"><i
					class="moto-pagination-link-icon moto-pagination-link-text fa fa-angle-double-right"></i></a>
		</li>', $currentPage + 1);
		}

		return '<ul class="moto-pagination-group moto-pagination-group_pages">' . $output . '</ul>';
	}
}
