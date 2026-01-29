<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownload;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadGetResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CsvDownloadsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CsvDownloadCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CsvDownloadNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CsvDownloadCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CsvDownloadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<CsvDownload>>
     *
     * @throws APIException
     */
    public function list(
        array|CsvDownloadListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
