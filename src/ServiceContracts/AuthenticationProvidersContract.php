<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams\Page;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams\Sort;
use Telnyx\AuthenticationProviders\AuthenticationProviderListResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\AuthenticationProviders\Settings;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AuthenticationProvidersContract
{
    /**
     * @api
     *
     * @param string $name the name associated with the authentication provider
     * @param Settings $settings the settings associated with the authentication provider
     * @param string $shortName The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     * @param bool $active The active status of the authentication provider
     * @param string $settingsURL The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     *
     * @return AuthenticationProviderNewResponse<HasRawResponse>
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
    ): AuthenticationProviderNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AuthenticationProviderNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderNewResponse;

    /**
     * @api
     *
     * @return AuthenticationProviderGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderGetResponse;

    /**
     * @api
     *
     * @return AuthenticationProviderGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderGetResponse;

    /**
     * @api
     *
     * @param bool $active The active status of the authentication provider
     * @param string $name the name associated with the authentication provider
     * @param Settings $settings the settings associated with the authentication provider
     * @param string $settingsURL The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     * @param string $shortName The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     *
     * @return AuthenticationProviderUpdateResponse<HasRawResponse>
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
    ): AuthenticationProviderUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AuthenticationProviderUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderUpdateResponse;

    /**
     * @api
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
     * @return AuthenticationProviderListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AuthenticationProviderListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderListResponse;

    /**
     * @api
     *
     * @return AuthenticationProviderDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderDeleteResponse;

    /**
     * @api
     *
     * @return AuthenticationProviderDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderDeleteResponse;
}
