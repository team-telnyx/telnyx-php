<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\CsvFormat;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadGetResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams\Page;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\CsvDownloadsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param CsvFormat|value-of<CsvFormat> $csvFormat Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference]
     */
    public function create(
        $csvFormat = omit,
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): CsvDownloadNewResponse {
        [$parsed, $options] = CsvDownloadCreateParams::parseRequest(
            ['csvFormat' => $csvFormat, 'filter' => $filter],
            $requestOptions
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CsvDownloadListResponse {
        [$parsed, $options] = CsvDownloadListParams::parseRequest(
            ['page' => $page],
            $requestOptions
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
