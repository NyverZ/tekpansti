<?php

namespace Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $compiledViewPath = base_path('.phpunit.cache/views');

        File::ensureDirectoryExists($compiledViewPath);
        config()->set('view.compiled', $compiledViewPath);
    }
}
