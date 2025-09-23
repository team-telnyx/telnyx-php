<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OAuthClients\OAuthClientCreateParams\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClientCreateParams\ClientType;
use Telnyx\OAuthClients\OAuthClientGetResponse;
use Telnyx\OAuthClients\OAuthClientListParams\FilterAllowedGrantTypesContains;
use Telnyx\OAuthClients\OAuthClientListParams\FilterClientType;
use Telnyx\OAuthClients\OAuthClientListResponse;
use Telnyx\OAuthClients\OAuthClientNewResponse;
use Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType as AllowedGrantType1;
use Telnyx\OAuthClients\OAuthClientUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface OAuthClientsContract
{
    /**
     * @api
     *
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes List of allowed OAuth grant types
     * @param list<string> $allowedScopes List of allowed OAuth scopes
     * @param ClientType|value-of<ClientType> $clientType OAuth client type
     * @param string $name The name of the OAuth client
     * @param string $logoUri URL of the client logo
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris List of redirect URIs (required for authorization_code flow)
     * @param bool $requirePkce Whether PKCE (Proof Key for Code Exchange) is required for this client
     * @param string $tosUri URL of the client's terms of service
     *
     * @return OAuthClientNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $allowedGrantTypes,
        $allowedScopes,
        $clientType,
        $name,
        $logoUri = omit,
        $policyUri = omit,
        $redirectUris = omit,
        $requirePkce = omit,
        $tosUri = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthClientNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientNewResponse;

    /**
     * @api
     *
     * @return OAuthClientGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthClientGetResponse;

    /**
     * @api
     *
     * @return OAuthClientGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientGetResponse;

    /**
     * @api
     *
     * @param list<AllowedGrantType1|value-of<AllowedGrantType1>> $allowedGrantTypes List of allowed OAuth grant types
     * @param list<string> $allowedScopes List of allowed OAuth scopes
     * @param string $logoUri URL of the client logo
     * @param string $name The name of the OAuth client
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris List of redirect URIs
     * @param bool $requirePkce Whether PKCE (Proof Key for Code Exchange) is required for this client
     * @param string $tosUri URL of the client's terms of service
     *
     * @return OAuthClientUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $allowedGrantTypes = omit,
        $allowedScopes = omit,
        $logoUri = omit,
        $name = omit,
        $policyUri = omit,
        $redirectUris = omit,
        $requirePkce = omit,
        $tosUri = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthClientUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientUpdateResponse;

    /**
     * @api
     *
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains> $filterAllowedGrantTypesContains Filter by allowed grant type
     * @param string $filterClientID Filter by client ID
     * @param FilterClientType|value-of<FilterClientType> $filterClientType Filter by client type
     * @param string $filterName Filter by exact client name
     * @param string $filterNameContains Filter by client name containing text
     * @param bool $filterVerified Filter by verification status
     * @param int $pageNumber Page number
     * @param int $pageSize Number of results per page
     *
     * @return OAuthClientListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filterAllowedGrantTypesContains = omit,
        $filterClientID = omit,
        $filterClientType = omit,
        $filterName = omit,
        $filterNameContains = omit,
        $filterVerified = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthClientListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
