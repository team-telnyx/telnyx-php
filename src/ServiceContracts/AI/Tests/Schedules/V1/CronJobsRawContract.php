<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\Schedules\V1;

use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobCronJobsParams;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobRetrieveCronJobsParams;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobUpdateParams;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CronJobsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the scheduled test job
     * @param array<string,mixed>|CronJobUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CronJobCronJobsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScheduledTestJob>
     *
     * @throws APIException
     */
    public function cronJobs(
        array|CronJobCronJobsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CronJobRetrieveCronJobsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ScheduledTestJob>>
     *
     * @throws APIException
     */
    public function retrieveCronJobs(
        array|CronJobRetrieveCronJobsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
