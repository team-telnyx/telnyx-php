<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
        /** @var BaseResponse<OAuthGrantGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['oauth_grants/%1$s', $id],
            options: $requestOptions,
            convert: OAuthGrantGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of OAuth grants for the authenticated user
     *
     * @param array{pageNumber?: int, pageSize?: int}|OAuthGrantListParams $params
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

        /** @var BaseResponse<OAuthGrantListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'oauth_grants',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: OAuthGrantListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<OAuthGrantDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['oauth_grants/%1$s', $id],
            options: $requestOptions,
            convert: OAuthGrantDeleteResponse::class,
        );

        return $response->parse();
    }
}
