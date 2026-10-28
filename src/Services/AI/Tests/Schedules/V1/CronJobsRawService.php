<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\Schedules\V1;

use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobCronJobsParams;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobRetrieveCronJobsParams;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobUpdateParams;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobUpdateParams\NotifyOn;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\Schedules\V1\CronJobsRawContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CronJobsRawService implements CronJobsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the specified scheduled test job.
     *
     * @param int $id numeric ID of the scheduled test job
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScheduledTestJob>
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/tests/schedules/v1/cron-jobs/%1$s', $id],
            options: $requestOptions,
            convert: ScheduledTestJob::class,
        );
    }

    /**
     * @api
     *
     * Updates the specified scheduled test job.
     *
     * @param int $id numeric ID of the scheduled test job
     * @param array{
     *   agent?: int|null,
     *   crontabExpression?: string,
     *   executionMode?: string,
     *   frequency?: int,
     *   isActive?: bool,
     *   name?: string,
     *   notifyOn?: NotifyOn|value-of<NotifyOn>,
     *   personalities?: list<int>,
     *   runAsText?: bool,
     *   scenarios?: list<int>,
     *   tags?: list<string>,
     *   timezone?: string,
     * }|CronJobUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScheduledTestJob>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|CronJobUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CronJobUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/tests/schedules/v1/cron-jobs/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: ScheduledTestJob::class,
        );
    }

    /**
     * @api
     *
     * Deletes the specified scheduled test job.
     *
     * @param int $id numeric ID of the scheduled test job
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/tests/schedules/v1/cron-jobs/%1$s', $id],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Creates a scheduled test job that runs the selected scenarios on a cron expression.
     *
     * @param array{
     *   crontabExpression: string,
     *   agent?: int,
     *   executionMode?: string,
     *   frequency?: int,
     *   isActive?: bool,
     *   name?: string,
     *   notifyOn?: CronJobCronJobsParams\NotifyOn|value-of<CronJobCronJobsParams\NotifyOn>,
     *   personalities?: list<int>,
     *   runAsText?: bool,
     *   scenarios?: list<int>,
     *   tags?: list<string>,
     *   timezone?: string,
     * }|CronJobCronJobsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScheduledTestJob>
     *
     * @throws APIException
     */
    public function cronJobs(
        array|CronJobCronJobsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CronJobCronJobsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/schedules/v1/cron-jobs',
            body: (object) $parsed,
            options: $options,
            convert: ScheduledTestJob::class,
        );
    }

    /**
     * @api
     *
     * Returns the scheduled test jobs in your organization, optionally filtered by test agent. A scheduled job runs selected scenarios on a cron expression.
     *
     * @param array{agentID?: int}|CronJobRetrieveCronJobsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ScheduledTestJob>>
     *
     * @throws APIException
     */
    public function retrieveCronJobs(
        array|CronJobRetrieveCronJobsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CronJobRetrieveCronJobsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/schedules/v1/cron-jobs',
            query: Util::array_transform_keys($parsed, ['agentID' => 'agent_id']),
            options: $options,
            convert: new ListOf(ScheduledTestJob::class),
        );
    }
}
