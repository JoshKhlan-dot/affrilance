<?php

namespace Tests\Unit;

use App\Models\Job;
use App\Models\Proposal;
use Tests\TestCase;

class JobModelTest extends TestCase
{
    public function test_job_and_proposal_models_are_loadable(): void
    {
        $this->assertTrue(class_exists(Job::class));
        $this->assertTrue(class_exists(Proposal::class));
    }
}
