<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse;
use Telnyx\OAuthGrants\OAuthGrantGetResponse;
use Telnyx\OAuthGrants\OAuthGrantListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface OAuthGrantsContract
{
    /**
     * @api
     *
     * @return OAuthGrantGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantGetResponse;

    /**
     * @api
     *
     * @return OAuthGrantGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber Page number
     * @param int $pageSize Number of results per page
     *
     * @return OAuthGrantListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthGrantListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthGrantListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantListResponse;

    /**
     * @api
     *
     * @return OAuthGrantDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantDeleteResponse;

    /**
     * @api
     *
     * @return OAuthGrantDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantDeleteResponse;
}
