<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Filters\FilterCreateParams\Type;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse;
use Telnyx\EmailInboxes\Filters\FilterListResponse;
use Telnyx\EmailInboxes\Filters\FilterNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\FiltersContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FiltersService implements FiltersContract
{
    /**
     * @api
     */
    public FiltersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FiltersRawService($client);
    }

    /**
     * @api
     *
     * Adds entries to either the allowlist or blocklist. The operation is an
     * idempotent set union: entries already present remain unchanged.
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
    ): FilterNewResponse {
        $params = Util::removeNulls(['entries' => $entries, 'type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($inboxID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
     * @throws APIException
     */
    public function list(
        string $inboxID,
        RequestOptions|array|null $requestOptions = null
    ): FilterListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($inboxID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes entries from either the allowlist or blocklist. The operation is
     * idempotent: removing an entry that is not present still returns the current
     * filter lists.
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
    ): FilterDeleteAllResponse {
        $params = Util::removeNulls(['entries' => $entries, 'type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAll($inboxID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
