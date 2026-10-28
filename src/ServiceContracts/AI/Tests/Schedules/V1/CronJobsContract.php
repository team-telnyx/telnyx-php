<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\Schedules\V1;

use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobUpdateParams\NotifyOn;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CronJobsContract
{
    /**
     * @api
     *
     * @param int $id numeric ID of the scheduled test job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): ScheduledTestJob;

    /**
     * @api
     *
     * @param int $id numeric ID of the scheduled test job
     * @param string $crontabExpression cron expression controlling when the job runs
     * @param string $executionMode execution mode for the test runs, such as voice, text, or sip
     * @param NotifyOn|value-of<NotifyOn> $notifyOn
     * @param list<int> $personalities
     * @param list<int> $scenarios
     * @param list<string> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $id,
        int|Omitted|null $agent = Omitted::VALUE,
        ?string $crontabExpression = null,
        ?string $executionMode = null,
        ?int $frequency = null,
        ?bool $isActive = null,
        ?string $name = null,
        NotifyOn|string|null $notifyOn = null,
        ?array $personalities = null,
        ?bool $runAsText = null,
        ?array $scenarios = null,
        ?array $tags = null,
        ?string $timezone = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScheduledTestJob;

    /**
     * @api
     *
     * @param int $id numeric ID of the scheduled test job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $crontabExpression cron expression controlling when the job runs
     * @param string $executionMode execution mode for the test runs, such as voice, text, or sip
     * @param \Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobCronJobsParams\NotifyOn|value-of<\Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobCronJobsParams\NotifyOn> $notifyOn
     * @param list<int> $personalities
     * @param list<int> $scenarios
     * @param list<string> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cronJobs(
        string $crontabExpression,
        ?int $agent = null,
        ?string $executionMode = null,
        ?int $frequency = null,
        ?bool $isActive = null,
        ?string $name = null,
        \Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobCronJobsParams\NotifyOn|string|null $notifyOn = null,
        ?array $personalities = null,
        ?bool $runAsText = null,
        ?array $scenarios = null,
        ?array $tags = null,
        ?string $timezone = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScheduledTestJob;

    /**
     * @api
     *
     * @param int $agentID filter jobs belonging to the specified test agent
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ScheduledTestJob>
     *
     * @throws APIException
     */
    public function retrieveCronJobs(
        ?int $agentID = null,
        RequestOptions|array|null $requestOptions = null
    ): array;
}
