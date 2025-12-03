<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse;
use Telnyx\OAuthGrants\OAuthGrantGetResponse;
use Telnyx\OAuthGrants\OAuthGrantListParams;
use Telnyx\OAuthGrants\OAuthGrantListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthGrantsContract;

final class OAuthGrantsService implements OAuthGrantsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single OAuth grant by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['oauth_grants/%1$s', $id],
            options: $requestOptions,
            convert: OAuthGrantGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of OAuth grants for the authenticated user
     *
     * @param array{page_number_?: int, page_size_?: int}|OAuthGrantListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|OAuthGrantListParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantListResponse {
        [$parsed, $options] = OAuthGrantListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'oauth_grants',
            query: $parsed,
            options: $options,
            convert: OAuthGrantListResponse::class,
        );
    }

    /**
     * @api
     *
     * Revoke an OAuth grant
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['oauth_grants/%1$s', $id],
            options: $requestOptions,
            convert: OAuthGrantDeleteResponse::class,
        );
    }
}
