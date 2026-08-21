<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailBlocks;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\EmailBlocks\Imports\EmailBlockImportResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ImportsContract
{
    /**
     * @api
     *
     * @param string|FileParam $file The CSV file (Plug.Upload). Missing/non-upload → 400.
     * @param int $blockTtlDays TTL for imported `manual_block` rows; other reasons get `expires_at: null`. Invalid/missing → falls back to 30.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string|FileParam $file,
        int $blockTtlDays = 30,
        RequestOptions|array|null $requestOptions = null,
    ): EmailBlockImportResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockImportResponse;
}
