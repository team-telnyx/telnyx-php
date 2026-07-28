<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailBlocks;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailBlocks\Import\EmailBlockImportResponse;
use Telnyx\EmailBlocks\Import\ImportCreateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ImportRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ImportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockImportResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ImportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockImportResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
