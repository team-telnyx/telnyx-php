<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\EmailInboxCreateParams;
use Telnyx\EmailInboxes\EmailInboxListParams;
use Telnyx\EmailInboxes\EmailInboxListResponse;
use Telnyx\EmailInboxes\EmailInboxResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxesRawContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailInboxesRawService implements EmailInboxesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an inbox on an inbound-enabled domain. When `domain_id` is omitted, Telnyx
     * allocates the account's shared inbound subdomain so the inbox is immediately usable
     * without customer DNS setup. When `username` is omitted, a unique username is generated.
     *
     * @param array{
     *   domainID?: string, username?: string
     * }|EmailInboxCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailInboxResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailInboxCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailInboxCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_inboxes',
            body: (object) $parsed,
            options: $options,
            convert: EmailInboxResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns an account-scoped, non-deleted inbox. Missing and foreign inboxes are indistinguishable.
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailInboxResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_inboxes/%1$s', $id],
            options: $requestOptions,
            convert: EmailInboxResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the account's non-deleted inboxes newest first using stable cursor pagination.
     *
     * @param array{pageCursor?: string, pageSize?: int}|EmailInboxListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailInboxListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmailInboxListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailInboxListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_inboxes',
            query: Util::array_transform_keys(
                $parsed,
                ['pageCursor' => 'page_cursor', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: EmailInboxListResponse::class,
        );
    }

    /**
     * @api
     *
     * Soft-deletes an account-scoped inbox. Its address remains reserved and the inbox is no longer returned by list or get operations.
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_inboxes/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
