<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\OAuthGrants\OAuthGrant;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse;
use Telnyx\OAuthGrants\OAuthGrantGetResponse;
use Telnyx\OAuthGrants\OAuthGrantListParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthGrantsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OAuthGrantsRawService implements OAuthGrantsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single OAuth grant by ID
     *
     * @param string $id OAuth grant ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthGrantGetResponse>
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
     * @param array{pageNumber?: int, pageSize?: int}|OAuthGrantListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<OAuthGrant>>
     *
     * @throws APIException
     */
    public function list(
        array|OAuthGrantListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthGrantListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'oauth_grants',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
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
     * @param string $id OAuth grant ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthGrantDeleteResponse>
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
            path: ['oauth_grants/%1$s', $id],
            options: $requestOptions,
            convert: OAuthGrantDeleteResponse::class,
        );
    }
}
