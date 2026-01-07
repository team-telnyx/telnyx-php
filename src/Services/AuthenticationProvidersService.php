<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuthenticationProviders\AuthenticationProvider;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams\Sort;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\AuthenticationProviders\Settings;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuthenticationProvidersContract;

/**
 * @phpstan-import-type SettingsShape from \Telnyx\AuthenticationProviders\Settings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AuthenticationProvidersService implements AuthenticationProvidersContract
{
    /**
     * @api
     */
    public AuthenticationProvidersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthenticationProvidersRawService($client);
    }

    /**
     * @api
     *
     * Creates an authentication provider.
     *
     * @param string $name the name associated with the authentication provider
     * @param Settings|SettingsShape $settings the settings associated with the authentication provider
     * @param string $shortName The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     * @param bool $active The active status of the authentication provider
     * @param string $settingsURL The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        Settings|array $settings,
        string $shortName,
        bool $active = true,
        ?string $settingsURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): AuthenticationProviderNewResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'settings' => $settings,
                'shortName' => $shortName,
                'active' => $active,
                'settingsURL' => $settingsURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing authentication provider.
     *
     * @param string $id authentication provider ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticationProviderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing authentication provider.
     *
     * @param string $id identifies the resource
     * @param bool $active The active status of the authentication provider
     * @param string $name the name associated with the authentication provider
     * @param Settings|SettingsShape $settings the settings associated with the authentication provider
     * @param string $settingsURL The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     * @param string $shortName The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        bool $active = true,
        ?string $name = null,
        Settings|array|null $settings = null,
        ?string $settingsURL = null,
        ?string $shortName = null,
        RequestOptions|array|null $requestOptions = null,
    ): AuthenticationProviderUpdateResponse {
        $params = Util::removeNulls(
            [
                'active' => $active,
                'name' => $name,
                'settings' => $settings,
                'settingsURL' => $settingsURL,
                'shortName' => $shortName,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your SSO authentication providers.
     *
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AuthenticationProvider>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing authentication provider.
     *
     * @param string $id authentication provider ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticationProviderDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
