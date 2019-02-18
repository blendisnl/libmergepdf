<?php

namespace blendisnl\libmergepdf\Driver;

use blendisnl\libmergepdf\Source\SourceInterface;

interface DriverInterface
{
    /**
     * Merge multiple sources
     */
    public function merge(SourceInterface ...$sources): string;
}
