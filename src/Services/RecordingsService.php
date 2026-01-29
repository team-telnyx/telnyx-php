<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams\Filter;
use Telnyx\Recordings\RecordingListParams\Page;
use Telnyx\Recordings\RecordingResponseData;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RecordingsContract;
use Telnyx\Services\Recordings\ActionsService;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Recordings\RecordingListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Recordings\RecordingListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecordingsService implements RecordingsContract
{
    /**
     * @api
     */
    public RecordingsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RecordingsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Retrieves the details of an existing call recording.
     *
     * @param string $recordingID uniquely identifies the recording by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($recordingID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your call recordings.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id], filter[sip_call_id]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RecordingResponseData>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a call recording.
     *
     * @param string $recordingID uniquely identifies the recording by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $recordingID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($recordingID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
