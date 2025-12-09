<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\DateRange;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\RecordType;
use Telnyx\DetailRecords\DetailRecordListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DetailRecordsContract;

final class DetailRecordsService implements DetailRecordsContract
{
    /**
     * @api
     */
    public DetailRecordsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DetailRecordsRawService($client);
    }

    /**
     * @api
     *
     * Search for any detail record across the Telnyx Platform
     *
     * @param array{
     *   recordType: 'ai-voice-assistant'|'amd'|'call-control'|'conference'|'conference-participant'|'embedding'|'fax'|'inference'|'inference-speech-to-text'|'media_storage'|'media-streaming'|'messaging'|'noise-suppression'|'recording'|'sip-trunking'|'siprec-client'|'stt'|'tts'|'verify'|'webrtc'|'wireless'|RecordType,
     *   dateRange?: 'yesterday'|'today'|'tomorrow'|'last_week'|'this_week'|'next_week'|'last_month'|'this_month'|'next_month'|DateRange,
     * } $filter Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param list<string> $sort Specifies the sort order for results. <br/>Example: sort=-created_at
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
