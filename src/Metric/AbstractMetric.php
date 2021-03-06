<?php

namespace SeoAnalyzer\Metric;

use ReflectionClass;

abstract class AbstractMetric implements MetricInterface
{
    const HEADERS = 'headers';
    const DESCRIPTION = 'description';

    /**
     * @var string Metric name
     */
    public $name;

    /**
     * @var string Metric description
     */
    public $description;

    /**
     * @var mixed Metric value
     */
    public $value;

    /**
     * @var int Negative impact on SEO. Higher value then bigger negative impact.
     */
    public $impact = 0;

    /**
     * @param mixed $inputData Input data to compute metric value
     * @throws \ReflectionException
     */
    public function __construct($inputData)
    {
        if (empty($this->name)) {
            $this->name = str_replace(['SeoAnalyzer\\', 'Metric', '\\'], '', (new ReflectionClass($this))->getName());
        }
        $this->value = $inputData;
    }
}
