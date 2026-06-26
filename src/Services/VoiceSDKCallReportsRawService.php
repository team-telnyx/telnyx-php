<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VoiceSDKCallReportsRawContract;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams\Sort;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse;

/**
 * Retrieve raw Voice SDK call report stats payloads for WebRTC call troubleshooting.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceSDKCallReportsRawService implements VoiceSDKCallReportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns raw call report stats JSON payloads stored for the authenticated user and `call_id`. The user is derived from Telnyx authentication, not from request parameters.
     *
     * @param string $callID call identifier used to retrieve reports owned by the authenticated user
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<VoiceSDKCallReportGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['voice_sdk_call_reports/%1$s', $callID],
            options: $requestOptions,
            convert: new ListOf(VoiceSDKCallReportGetResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Returns paginated raw call report stats JSON payloads stored for the authenticated user. The user is derived from Telnyx authentication, not from request parameters.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, sort?: Sort|value-of<Sort>
     * }|VoiceSDKCallReportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VoiceSDKCallReportListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceSDKCallReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceSDKCallReportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'voice_sdk_call_reports',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: VoiceSDKCallReportListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
