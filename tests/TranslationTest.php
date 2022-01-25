<?php

namespace Ricadesign\TranslateJson\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ricadesign\TranslateJson\Tests\TestCase;
use Ricadesign\TranslateJson\TranslateJsonServiceProvider;

class TranslationTest extends TestCase
{
    /**
     * A basic feature test.
     *
     * @return void
     */
    public function test_csv_to_json()
    {
        $this->artisan('trans:build t.csv test')->assertSuccessful();
    }
}
