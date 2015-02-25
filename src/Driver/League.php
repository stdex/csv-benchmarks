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

use League\Csv\Reader;
use League\Csv\Writer;

/**
 * league/csv driver
 *
 * @package csv-benchmarks
 * @since  0.1.0
 */
class League extends AbstractDriver implements Driver
{
    /**
     * {@inheritdoc}
     */
    protected $package_name = "league/csv";

    /**
     * {@inheritdoc}
     */
    public function runReader()
    {
        $nbrows = 0;
        $csv = Reader::createFromPath($this->path);
        foreach ($csv as $row) {
            ++$nbrows;
        }

        return $nbrows;
    }

    /**
     * {@inheritdoc}
     */
    public function runWriter()
    {
        $csv = Writer::createFromPath($this->path, 'w');
        $csv->insertAll($this->generateRawData());

        return $this->nbrows;
    }
}
