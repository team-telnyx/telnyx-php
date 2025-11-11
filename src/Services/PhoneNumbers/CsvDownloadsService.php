<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;
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
     *   csv_format?: "V1"|"V2",
     *   filter?: array{
     *     billing_group_id?: string,
     *     connection_id?: string,
     *     customer_reference?: string,
     *     emergency_address_id?: string,
     *     has_bundle?: string,
     *     phone_number?: string,
     *     status?: "purchase-pending"|"purchase-failed"|"port-pending"|"active"|"deleted"|"port-failed"|"emergency-only"|"ported-out"|"port-out-pending",
     *     tag?: string,
     *     'voice.connection_name'?: array{
     *       contains?: string, ends_with?: string, eq?: string, starts_with?: string
     *     },
     *     'voice.usage_payment_method'?: "pay-per-minute"|"channel",
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/csv_downloads',
            query: $parsed,
            options: $options,
            convert: CsvDownloadNewResponse::class,
        );
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
        // @phpstan-ignore-next-line;
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/csv_downloads',
            query: $parsed,
            options: $options,
            convert: CsvDownloadListResponse::class,
        );
    }
}
