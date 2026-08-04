<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\EmailInboxListResponse;
use Telnyx\EmailInboxes\EmailInboxResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxesContract;
use Telnyx\Services\EmailInboxes\DraftsService;
use Telnyx\Services\EmailInboxes\FiltersService;
use Telnyx\Services\EmailInboxes\MessagesService;
use Telnyx\Services\EmailInboxes\ThreadsService;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailInboxesService implements EmailInboxesContract
{
    /**
     * @api
     */
    public EmailInboxesRawService $raw;

    /**
     * @api
     */
    public DraftsService $drafts;

    /**
     * @api
     */
    public FiltersService $filters;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @api
     */
    public ThreadsService $threads;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailInboxesRawService($client);
        $this->drafts = new DraftsService($client);
        $this->filters = new FiltersService($client);
        $this->messages = new MessagesService($client);
        $this->threads = new ThreadsService($client);
    }

    /**
     * @api
     *
     * Creates an inbox on an inbound-enabled domain. When `domain_id` is omitted, Telnyx
     * allocates the account's shared inbound subdomain so the inbox is immediately usable
     * without customer DNS setup. When `username` is omitted, a unique username is generated.
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
    ): EmailInboxResponse {
        $params = Util::removeNulls(
            ['domainID' => $domainID, 'username' => $username]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns an account-scoped, non-deleted inbox. Missing and foreign inboxes are indistinguishable.
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailInboxResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the account's non-deleted inboxes newest first using stable cursor pagination.
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
    ): EmailInboxListResponse {
        $params = Util::removeNulls(
            ['pageCursor' => $pageCursor, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Soft-deletes an account-scoped inbox. Its address remains reserved and the inbox is no longer returned by list or get operations.
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
