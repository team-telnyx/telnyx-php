<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownload;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\CsvFormat;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadGetResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CsvDownloadsContract
{
    /**
     * @api
     *
     * @param CsvFormat|value-of<CsvFormat> $csvFormat Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference]
     * @param bool $includeManagedAccounts When true, the CSV includes phone numbers from all managed accounts in addition to the requesting account's own numbers. Only applies to V2 format; ignored for V1. The export appends `user_id` and `email` columns identifying the account that owns each number. When a filter is provided, it applies to the combined set of numbers. Requires access to managed accounts; requests without that access are rejected.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        CsvFormat|string $csvFormat = 'V1',
        Filter|array|null $filter = null,
        bool $includeManagedAccounts = false,
        RequestOptions|array|null $requestOptions = null,
    ): CsvDownloadNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the CSV download
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CsvDownloadGetResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;
}
