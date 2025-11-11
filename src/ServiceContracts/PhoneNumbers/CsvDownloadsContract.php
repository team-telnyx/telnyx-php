<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadGetResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListResponse;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadNewResponse;
use Telnyx\RequestOptions;

interface CsvDownloadsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CsvDownloadCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CsvDownloadCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CsvDownloadNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CsvDownloadGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CsvDownloadListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CsvDownloadListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CsvDownloadListResponse;
}
