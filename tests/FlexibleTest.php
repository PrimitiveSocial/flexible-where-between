<?php

namespace PrimitiveSocial\FlexibleWhereBetween\Tests;

use Carbon\Carbon;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\DB;
use PrimitiveSocial\FlexibleWhereBetween\Tests\Models\Log;
use PrimitiveSocial\FlexibleWhereBetween\FlexibleWhereBetweenServiceProvider;
use PrimitiveSocial\FlexibleWhereBetween\FlexibleWhereBetween as WhereBetween;

class FlexibleTest extends TestCase
{
    use WhereBetween;

    protected function getPackageProviders($app)
    {
        return [FlexibleWhereBetweenServiceProvider::class];
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'testing']);

        $this->loadMigrationsFrom([
            '--database' => 'testing',
            '--path' => realpath(__DIR__ . '/migrations'),
        ]);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    /** @test */
    public function it_is_flexible()
    {
        $first = Carbon::parse('2020-10-01');
        $second = Carbon::parse('2020-10-10');
        $third = Carbon::parse('2020-10-20');

        $count = Log::whereBetween('created_at', [NULL, $third])->count();
        $this->assertEquals(3, $count);

        $count = Log::whereBetween('created_at', [NULL, $second])->count();
        $this->assertEquals(2, $count);

        $count = Log::whereBetween('created_at', [NULL, $first])->count();
        $this->assertEquals(1, $count);

        $count = Log::whereBetween('created_at', [$third, NULL])->count();
        $this->assertEquals(1, $count);

        $count = Log::whereBetween('created_at', [$second, NULL])->count();
        $this->assertEquals(2, $count);

        $count = Log::whereBetween('created_at', [$first, NULL])->count();
        $this->assertEquals(3, $count);

        $count = Log::whereBetween('created_at', [NULL, NULL])->count();
        $this->assertEquals(3, $count);
    }

}
