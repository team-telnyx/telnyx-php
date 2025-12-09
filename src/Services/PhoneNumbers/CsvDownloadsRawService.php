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
use Telnyx\ServiceContracts\PhoneNumbers\CsvDownloadsRawContract;

final class CsvDownloadsRawService implements CsvDownloadsRawContract
{
    // @phpstan-ignore-next-line
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
     * @return BaseResponse<CsvDownloadNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CsvDownloadCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CsvDownloadCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/csv_downloads',
            query: Util::array_transform_keys($parsed, ['csvFormat' => 'csv_format']),
            options: $options,
            convert: CsvDownloadNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a CSV download
     *
     * @param string $id identifies the CSV download
     *
     * @return BaseResponse<CsvDownloadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['phone_numbers/csv_downloads/%1$s', $id],
            options: $requestOptions,
            convert: CsvDownloadGetResponse::class,
        );
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
     * @return BaseResponse<CsvDownloadListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CsvDownloadListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CsvDownloadListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/csv_downloads',
            query: $parsed,
            options: $options,
            convert: CsvDownloadListResponse::class,
        );
    }
}
