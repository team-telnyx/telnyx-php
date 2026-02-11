<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Events\EventGetEventDetailsParams;
use Telnyx\AI\Missions\Runs\Events\EventGetEventDetailsResponse;
use Telnyx\AI\Missions\Runs\Events\EventListParams;
use Telnyx\AI\Missions\Runs\Events\EventListResponse;
use Telnyx\AI\Missions\Runs\Events\EventLogParams;
use Telnyx\AI\Missions\Runs\Events\EventLogParams\Type;
use Telnyx\AI\Missions\Runs\Events\EventLogResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\Runs\EventsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EventsRawService implements EventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List events for a run (paginated)
     *
     * @param string $runID Path param
     * @param array{
     *   missionID: string,
     *   agentID?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   stepID?: string,
     *   type?: string,
     * }|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $runID,
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/runs/%2$s/events', $missionID, $runID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'agentID' => 'agent_id',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'stepID' => 'step_id',
                ],
            ),
            options: $options,
            convert: EventListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Get details of a specific event
     *
     * @param array{
     *   missionID: string, runID: string
     * }|EventGetEventDetailsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventGetEventDetailsResponse>
     *
     * @throws APIException
     */
    public function getEventDetails(
        string $eventID,
        array|EventGetEventDetailsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventGetEventDetailsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);
        $runID = $parsed['runID'];
        unset($parsed['runID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/missions/%1$s/runs/%2$s/events/%3$s', $missionID, $runID, $eventID,
            ],
            options: $options,
            convert: EventGetEventDetailsResponse::class,
        );
    }

    /**
     * @api
     *
     * Log an event for a run
     *
     * @param string $runID Path param
     * @param array{
     *   missionID: string,
     *   summary: string,
     *   type: value-of<Type>,
     *   agentID?: string,
     *   idempotencyKey?: string,
     *   payload?: array<string,mixed>,
     *   stepID?: string,
     * }|EventLogParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventLogResponse>
     *
     * @throws APIException
     */
    public function log(
        string $runID,
        array|EventLogParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventLogParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs/%2$s/events', $missionID, $runID],
            body: (object) array_diff_key($parsed, array_flip(['missionID'])),
            options: $options,
            convert: EventLogResponse::class,
        );
    }
}
