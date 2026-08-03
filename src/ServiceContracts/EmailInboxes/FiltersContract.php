<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Filters\FilterAddParams\Type;
use Telnyx\EmailInboxes\Filters\FilterAddResponse;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse;
use Telnyx\EmailInboxes\Filters\FilterListResponse;
use Telnyx\EmailInboxes\Filters\FilterReplaceResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FiltersContract
{
    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        RequestOptions|array|null $requestOptions = null
    ): FilterListResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param list<string> $entries
     * @param Type|value-of<Type> $type the list to change
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $inboxID,
        array $entries,
        Type|string $type,
        RequestOptions|array|null $requestOptions = null,
    ): FilterAddResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param list<string> $entries
     * @param \Telnyx\EmailInboxes\Filters\FilterDeleteAllParams\Type|value-of<\Telnyx\EmailInboxes\Filters\FilterDeleteAllParams\Type> $type the list to change
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAll(
        string $inboxID,
        array $entries,
        \Telnyx\EmailInboxes\Filters\FilterDeleteAllParams\Type|string $type,
        RequestOptions|array|null $requestOptions = null,
    ): FilterDeleteAllResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param list<string> $allowlist
     * @param list<string> $blocklist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $inboxID,
        ?array $allowlist = null,
        ?array $blocklist = null,
        RequestOptions|array|null $requestOptions = null,
    ): FilterReplaceResponse;
}
