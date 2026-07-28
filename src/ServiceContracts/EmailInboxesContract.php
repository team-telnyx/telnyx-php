<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\EmailInboxListResponse;
use Telnyx\EmailInboxes\EmailInboxResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailInboxesContract
{
    /**
     * @api
     *
     * @param string $domainID Account-owned, inbound-enabled domain UUID. The account's shared inbound subdomain is allocated when omitted.
     * @param string $username Inbox local part. Trimmed and lowercased before validation; the normalized value must be 1-64 characters, start and end with a letter or digit, and contain only letters, digits, dots, hyphens, and underscores. Generated when omitted.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $domainID = null,
        ?string $username = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailInboxResponse;

    /**
     * @api
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailInboxResponse;

    /**
     * @api
     *
     * @param string $pageCursor opaque cursor returned by the previous inbox page
     * @param int $pageSize Number of results to return. Defaults to 20; maximum is 250.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $pageCursor = null,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): EmailInboxListResponse;

    /**
     * @api
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
