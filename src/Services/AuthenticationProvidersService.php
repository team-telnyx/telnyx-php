<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuthenticationProviders\AuthenticationProviderCreateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams\Page;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams\Sort;
use Telnyx\AuthenticationProviders\AuthenticationProviderListResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\AuthenticationProviders\Settings;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuthenticationProvidersContract;

use const Telnyx\Core\OMIT as omit;

final class AuthenticationProvidersService implements AuthenticationProvidersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an authentication provider.
     *
     * @param string $name the name associated with the authentication provider
     * @param Settings $settings the settings associated with the authentication provider
     * @param string $shortName The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     * @param bool $active The active status of the authentication provider
     * @param string $settingsURL The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     *
     * @throws APIException
     */
    public function create(
        $name,
        $settings,
        $shortName,
        $active = omit,
        $settingsURL = omit,
        ?RequestOptions $requestOptions = null,
    ): AuthenticationProviderNewResponse {
        $params = [
            'name' => $name,
            'settings' => $settings,
            'shortName' => $shortName,
            'active' => $active,
            'settingsURL' => $settingsURL,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderNewResponse {
        [$parsed, $options] = AuthenticationProviderCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'authentication_providers',
            body: (object) $parsed,
            options: $options,
            convert: AuthenticationProviderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing authentication provider.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['authentication_providers/%1$s', $id],
            options: $requestOptions,
            convert: AuthenticationProviderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing authentication provider.
     *
     * @param bool $active The active status of the authentication provider
     * @param string $name the name associated with the authentication provider
     * @param Settings $settings the settings associated with the authentication provider
     * @param string $settingsURL The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     * @param string $shortName The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $active = omit,
        $name = omit,
        $settings = omit,
        $settingsURL = omit,
        $shortName = omit,
        ?RequestOptions $requestOptions = null,
    ): AuthenticationProviderUpdateResponse {
        $params = [
            'active' => $active,
            'name' => $name,
            'settings' => $settings,
            'settingsURL' => $settingsURL,
            'shortName' => $shortName,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderUpdateResponse {
        [$parsed, $options] = AuthenticationProviderUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['authentication_providers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: AuthenticationProviderUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your SSO authentication providers.
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code>-</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>name</code>: sorts the result by the
     *     <code>name</code> field in ascending order.
     *   </li>
     *   <li>
     *     <code>-name</code>: sorts the result by the
     *     <code>name</code> field in descending order.
     *   </li>
     * </ul><br/>If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderListResponse {
        $params = ['page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderListResponse {
        [$parsed, $options] = AuthenticationProviderListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'authentication_providers',
            query: $parsed,
            options: $options,
            convert: AuthenticationProviderListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing authentication provider.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['authentication_providers/%1$s', $id],
            options: $requestOptions,
            convert: AuthenticationProviderDeleteResponse::class,
        );
    }
}
