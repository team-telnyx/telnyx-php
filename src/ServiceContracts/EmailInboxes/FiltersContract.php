<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Filters\FilterCreateParams\Type;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse;
use Telnyx\EmailInboxes\Filters\FilterListResponse;
use Telnyx\EmailInboxes\Filters\FilterNewResponse;
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
     * @param list<string> $entries
     * @param Type|value-of<Type> $type the list to change
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $inboxID,
        array $entries,
        Type|string $type,
        RequestOptions|array|null $requestOptions = null,
    ): FilterNewResponse;

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
}
