<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Events\EventData;
use Telnyx\AI\Missions\Runs\Events\EventGetEventDetailsParams;
use Telnyx\AI\Missions\Runs\Events\EventListParams;
use Telnyx\AI\Missions\Runs\Events\EventLogParams;
use Telnyx\AI\Missions\Runs\Events\EventResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EventsRawContract
{
    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param array<string,mixed>|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EventData>>
     *
     * @throws APIException
     */
    public function list(
        string $runID,
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventID unique identifier of the event
     * @param array<string,mixed>|EventGetEventDetailsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventResponse>
     *
     * @throws APIException
     */
    public function getEventDetails(
        string $eventID,
        array|EventGetEventDetailsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param array<string,mixed>|EventLogParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventResponse>
     *
     * @throws APIException
     */
    public function log(
        string $runID,
        array|EventLogParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
