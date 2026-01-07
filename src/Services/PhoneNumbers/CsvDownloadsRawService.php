<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownload;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\CsvFormat;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadGetResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams\Page;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\CsvDownloadsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   csvFormat?: CsvFormat|value-of<CsvFormat>, filter?: Filter|FilterShape
     * }|CsvDownloadCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CsvDownloadNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CsvDownloadCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CsvDownloadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param array{page?: Page|PageShape}|CsvDownloadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<CsvDownload>>
     *
     * @throws APIException
     */
    public function list(
        array|CsvDownloadListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: CsvDownload::class,
            page: DefaultPagination::class,
        );
    }
}
