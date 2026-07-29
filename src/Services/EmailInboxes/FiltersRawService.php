<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Filters\FilterAddParams;
use Telnyx\EmailInboxes\Filters\FilterAddParams\Type;
use Telnyx\EmailInboxes\Filters\FilterAddResponse;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllParams;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse;
use Telnyx\EmailInboxes\Filters\FilterListResponse;
use Telnyx\EmailInboxes\Filters\FilterReplaceParams;
use Telnyx\EmailInboxes\Filters\FilterReplaceResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\FiltersRawContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FiltersRawService implements FiltersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the inbox's sender allowlist and blocklist. Entries are normalized
     * to lowercase. A blocklist match takes precedence over an allowlist match;
     * when both lists are empty, all senders are accepted.
     *
     * @param string $inboxID email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_inboxes/%1$s/filters', $inboxID],
            options: $requestOptions,
            convert: FilterListResponse::class,
        );
    }

    /**
     * @api
     *
     * Adds entries to either the allowlist or blocklist. The operation is an
     * idempotent set union: entries already present remain unchanged.
     *
     * @param string $inboxID email inbox UUID
     * @param array{
     *   entries: list<string>, type: Type|value-of<Type>
     * }|FilterAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $inboxID,
        array|FilterAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FilterAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_inboxes/%1$s/filters', $inboxID],
            body: (object) $parsed,
            options: $options,
            convert: FilterAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes entries from either the allowlist or blocklist. The operation is
     * idempotent: removing an entry that is not present still returns the current
     * filter lists.
     *
     * @param string $inboxID email inbox UUID
     * @param array{
     *   entries: list<string>,
     *   type: FilterDeleteAllParams\Type|value-of<FilterDeleteAllParams\Type>,
     * }|FilterDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterDeleteAllResponse>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $inboxID,
        array|FilterDeleteAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FilterDeleteAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_inboxes/%1$s/filters', $inboxID],
            body: (object) $parsed,
            options: $options,
            convert: FilterDeleteAllResponse::class,
        );
    }

    /**
     * @api
     *
     * Replaces both sender filter lists atomically. Omitting either list clears
     * that list. Use `POST` or `DELETE` for incremental changes.
     *
     * @param string $inboxID email inbox UUID
     * @param array{
     *   allowlist?: list<string>, blocklist?: list<string>
     * }|FilterReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterReplaceResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $inboxID,
        array|FilterReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FilterReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['email_inboxes/%1$s/filters', $inboxID],
            body: (object) $parsed,
            options: $options,
            convert: FilterReplaceResponse::class,
        );
    }
}
