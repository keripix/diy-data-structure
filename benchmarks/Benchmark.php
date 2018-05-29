<?php

namespace Diy\Benchmark;

class Benchmark
{
    private $startMemoryUsage;
    private $startTime;
    private $endMemoryUsage;
    private $endTime;
    /**
     * @var string
     */
    private $title;

    private function __construct(string $title)
    {
        $this->startMemoryUsage = memory_get_usage();
        $this->startTime = microtime(true);
        $this->title = $title;
    }

    public static function start(string $title): Benchmark
    {
        return new self($title);
    }

    public function end()
    {
        $this->endMemoryUsage = memory_get_usage();
        $this->endTime = microtime(true);
    }

    public function __destruct()
    {
        print_r([
            'Title' => $this->title,
            'Start Memory' => $this->startMemoryUsage,
            'Finish Memory' => $this->endMemoryUsage,
            'Delta Memory' => $this->endMemoryUsage - $this->startMemoryUsage,
            'Start Time' => $this->startTime,
            'End Time' => $this->endTime,
            'Delta Time' => $this->endTime - $this->startTime . ' second'
        ]);
    }
}