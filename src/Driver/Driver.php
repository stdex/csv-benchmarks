<?php
/**
 * This file is part of the csv-benchmarks library
 *
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/nyamsprod/csv-benchmark
 * @version 0.1.0
 * @package csv-benchmarks
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace CsvBenchmarks\Driver;

/**
 * An Interface to create package specific tests
 *
 * @package csv-benchmarks
 * @since  0.1.0
 */
interface Driver
{
    /**
     * Set the cells number per row to be inserted when writing to the CSV document
     *
     * @param int $nbcells
     */
    public function setCellCount($nbcells);

    /**
     * Get the cells count per row
     *
     * @return int
     */
    public function getCellCount();

    /**
     * Set the rows count to be inserted when writing to the CSV document
     *
     * @param int $nbrows
     */
    public function setRowCount($nbrows);

    /**
     * Get row count per CSV document
     *
     * @return int
     */
    public function getRowCount();

    /**
     * Set CSV document path to read from or write to
     *
     * @param string $path
     */
    public function setPath($path);

    /**
     * return current CSV document path
     *
     * @return string
     */
    public function getPath();

    /**
     * Return the Package Name
     *
     * @return string
     */
    public function getName();

    /**
     * Reader test
     *
     * @return int  the number of lines read
     */
    public function runReader();

    /**
     * Writer test
     */
    public function runWriter();
}
