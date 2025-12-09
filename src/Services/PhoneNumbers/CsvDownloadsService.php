<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\CsvFormat;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\Status;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadGetResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\CsvDownloadsContract;

final class CsvDownloadsService implements CsvDownloadsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a CSV download
     *
     * @param array{
     *   csvFormat?: 'V1'|'V2'|CsvFormat,
     *   filter?: array{
     *     billingGroupID?: string,
     *     connectionID?: string,
     *     customerReference?: string,
     *     emergencyAddressID?: string,
     *     hasBundle?: string,
     *     phoneNumber?: string,
     *     status?: 'purchase-pending'|'purchase-failed'|'port-pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending'|Status,
     *     tag?: string,
     *     voiceConnectionName?: array{
     *       contains?: string, endsWith?: string, eq?: string, startsWith?: string
     *     },
     *     voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|VoiceUsagePaymentMethod,
     *   },
     * }|CsvDownloadCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CsvDownloadCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CsvDownloadNewResponse {
        [$parsed, $options] = CsvDownloadCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CsvDownloadNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'phone_numbers/csv_downloads',
            query: Util::array_transform_keys($parsed, ['csvFormat' => 'csv_format']),
            options: $options,
            convert: CsvDownloadNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a CSV download
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CsvDownloadGetResponse {
        /** @var BaseResponse<CsvDownloadGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['phone_numbers/csv_downloads/%1$s', $id],
            options: $requestOptions,
            convert: CsvDownloadGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List CSV downloads
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|CsvDownloadListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CsvDownloadListParams $params,
        ?RequestOptions $requestOptions = null
    ): CsvDownloadListResponse {
        [$parsed, $options] = CsvDownloadListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CsvDownloadListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'phone_numbers/csv_downloads',
            query: $parsed,
            options: $options,
            convert: CsvDownloadListResponse::class,
        );

        return $response->parse();
    }
}
