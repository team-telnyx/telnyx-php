<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DetailRecords\DetailRecordListParams;
use Telnyx\DetailRecords\DetailRecordListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DetailRecordsContract;

final class DetailRecordsService implements DetailRecordsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Search for any detail record across the Telnyx Platform
     *
     * @param array{
     *   filter?: array{
     *     record_type: 'ai-voice-assistant'|'amd'|'call-control'|'conference'|'conference-participant'|'embedding'|'fax'|'inference'|'inference-speech-to-text'|'media_storage'|'media-streaming'|'messaging'|'noise-suppression'|'recording'|'sip-trunking'|'siprec-client'|'stt'|'tts'|'verify'|'webrtc'|'wireless',
     *     date_range?: 'yesterday'|'today'|'tomorrow'|'last_week'|'this_week'|'next_week'|'last_month'|'this_month'|'next_month',
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: list<string>,
     * }|DetailRecordListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DetailRecordListParams $params,
        ?RequestOptions $requestOptions = null
    ): DetailRecordListResponse {
        [$parsed, $options] = DetailRecordListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DetailRecordListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'detail_records',
            query: $parsed,
            options: $options,
            convert: DetailRecordListResponse::class,
        );

        return $response->parse();
    }
}
