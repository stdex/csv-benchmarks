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

use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;

/**
 * goodby/csv driver
 *
 * @package csv-benchmarks
 * @since  0.1.0
 */
class Goodby extends AbstractDriver implements Driver
{
    /**
     * {@inheritdoc}
     */
    protected $package_name = "goodby/csv";

    /**
     * {@inheritdoc}
     */
    public function runReader()
    {
        $nbrows = 0;
        $interpreter = new Interpreter();
        $interpreter->addObserver(function (array $rows) use (&$nbrows) {
            ++$nbrows;
        });
        $lexer = new Lexer(new LexerConfig());
        $lexer->parse($this->path, $interpreter);

        return $nbrows;
    }

    /**
     * {@inheritdoc}
     */
    public function runWriter()
    {
        $exporter = new Exporter(new ExporterConfig());
        $exporter->export($this->path, $this->generateRawData());

        return $this->nbrows;
    }
}
