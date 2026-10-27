<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\Schedules\V1;

use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobUpdateParams\NotifyOn;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\Schedules\V1\CronJobsContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CronJobsService implements CronJobsContract
{
    /**
     * @api
     */
    public CronJobsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CronJobsRawService($client);
    }

    /**
     * @api
     *
     * Returns the specified scheduled test job.
     *
     * @param int $id numeric ID of the scheduled test job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): ScheduledTestJob {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified scheduled test job.
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
    ): ScheduledTestJob {
        $params = array_filter(
            [
                'agent' => $agent,
                'crontabExpression' => $crontabExpression ?? Omitted::VALUE,
                'executionMode' => $executionMode ?? Omitted::VALUE,
                'frequency' => $frequency ?? Omitted::VALUE,
                'isActive' => $isActive ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'notifyOn' => $notifyOn ?? Omitted::VALUE,
                'personalities' => $personalities ?? Omitted::VALUE,
                'runAsText' => $runAsText ?? Omitted::VALUE,
                'scenarios' => $scenarios ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'timezone' => $timezone ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the specified scheduled test job.
     *
     * @param int $id numeric ID of the scheduled test job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a scheduled test job that runs the selected scenarios on a cron expression.
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
    ): ScheduledTestJob {
        $params = array_filter(
            [
                'crontabExpression' => $crontabExpression,
                'agent' => $agent ?? Omitted::VALUE,
                'executionMode' => $executionMode ?? Omitted::VALUE,
                'frequency' => $frequency ?? Omitted::VALUE,
                'isActive' => $isActive ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'notifyOn' => $notifyOn ?? Omitted::VALUE,
                'personalities' => $personalities ?? Omitted::VALUE,
                'runAsText' => $runAsText ?? Omitted::VALUE,
                'scenarios' => $scenarios ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'timezone' => $timezone ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cronJobs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the scheduled test jobs in your organization, optionally filtered by test agent. A scheduled job runs selected scenarios on a cron expression.
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
    ): array {
        $params = array_filter(
            ['agentID' => $agentID ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCronJobs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
