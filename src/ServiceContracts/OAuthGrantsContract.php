<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\OAuthGrants\OAuthGrant;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse;
use Telnyx\OAuthGrants\OAuthGrantGetResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface OAuthGrantsContract
{
    /**
     * @api
     *
     * @param string $id OAuth grant ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): OAuthGrantGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber Page number
     * @param int $pageSize Number of results per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<OAuthGrant>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id OAuth grant ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): OAuthGrantDeleteResponse;
}
