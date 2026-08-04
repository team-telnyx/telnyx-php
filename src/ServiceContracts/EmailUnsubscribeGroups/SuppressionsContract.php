<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailUnsubscribeGroups;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SuppressionsContract
{
    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $to,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (1–100, default 25)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EmailBlock>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        int $pageNumber = 1,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $email recipient address (normalized: trim + lower-case before matching)
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $email,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
