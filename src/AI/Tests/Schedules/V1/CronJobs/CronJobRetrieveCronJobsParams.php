<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\Schedules\V1\CronJobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the scheduled test jobs in your organization, optionally filtered by test agent. A scheduled job runs selected scenarios on a cron expression.
 *
 * @see Telnyx\Services\AI\Tests\Schedules\V1\CronJobsService::retrieveCronJobs()
 *
 * @phpstan-type CronJobRetrieveCronJobsParamsShape = array{agentID?: int|null}
 */
final class CronJobRetrieveCronJobsParams implements BaseModel
{
    /** @use SdkModel<CronJobRetrieveCronJobsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter jobs belonging to the specified test agent.
     */
    #[Optional]
    public ?int $agentID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $agentID = null): self
    {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * Filter jobs belonging to the specified test agent.
     */
    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }
}
