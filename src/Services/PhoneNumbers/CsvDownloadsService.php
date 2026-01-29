<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownload;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\CsvFormat;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadGetResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\CsvDownloadsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CsvDownloadsService implements CsvDownloadsContract
{
    /**
     * @api
     */
    public CsvDownloadsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CsvDownloadsRawService($client);
    }

    /**
     * @api
     *
     * Create a CSV download
     *
     * @param CsvFormat|value-of<CsvFormat> $csvFormat Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        CsvFormat|string $csvFormat = 'V1',
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): CsvDownloadNewResponse {
        $params = Util::removeNulls(
            ['csvFormat' => $csvFormat, 'filter' => $filter]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a CSV download
     *
     * @param string $id identifies the CSV download
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CsvDownloadGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List CSV downloads
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<CsvDownload>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
