<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\DetailRecords\DetailRecordListParams;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\DateRange;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\RecordType;
use Telnyx\DetailRecords\DetailRecordListResponse;
use Telnyx\DetailRecords\DetailRecordListResponse\AmdDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\ConferenceDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\ConferenceParticipantDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\MediaStorageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\SimCardUsageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\VerifyDetailRecord;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DetailRecordsRawContract;

final class DetailRecordsRawService implements DetailRecordsRawContract
{
    // @phpstan-ignore-next-line
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
     *     recordType: 'ai-voice-assistant'|'amd'|'call-control'|'conference'|'conference-participant'|'embedding'|'fax'|'inference'|'inference-speech-to-text'|'media_storage'|'media-streaming'|'messaging'|'noise-suppression'|'recording'|'sip-trunking'|'siprec-client'|'stt'|'tts'|'verify'|'webrtc'|'wireless'|RecordType,
     *     dateRange?: 'yesterday'|'today'|'tomorrow'|'last_week'|'this_week'|'next_week'|'last_month'|'this_month'|'next_month'|DateRange,
     *   },
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: list<string>,
     * }|DetailRecordListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord,>,>
     *
     * @throws APIException
     */
    public function list(
        array|DetailRecordListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = DetailRecordListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'detail_records',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: DetailRecordListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
