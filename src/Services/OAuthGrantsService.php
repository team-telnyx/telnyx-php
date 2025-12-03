<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\OAuthGrants\OAuthGrant;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse;
use Telnyx\OAuthGrants\OAuthGrantGetResponse;
use Telnyx\OAuthGrants\OAuthGrantListParams;
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
        // @phpstan-ignore-next-line;
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
     * @return DefaultFlatPagination<OAuthGrant>
     *
     * @throws APIException
     */
    public function list(
        array|OAuthGrantListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultFlatPagination {
        [$parsed, $options] = OAuthGrantListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'oauth_grants',
            query: $parsed,
            options: $options,
            convert: OAuthGrant::class,
            page: DefaultFlatPagination::class,
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['oauth_grants/%1$s', $id],
            options: $requestOptions,
            convert: OAuthGrantDeleteResponse::class,
        );
    }
}
