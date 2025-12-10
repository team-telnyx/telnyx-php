<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\OAuthGrants\OAuthGrant;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse;
use Telnyx\OAuthGrants\OAuthGrantGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthGrantsContract;

final class OAuthGrantsService implements OAuthGrantsContract
{
    /**
     * @api
     */
    public OAuthGrantsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OAuthGrantsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a single OAuth grant by ID
     *
     * @param string $id OAuth grant ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of OAuth grants for the authenticated user
     *
     * @param int $pageNumber Page number
     * @param int $pageSize Number of results per page
     *
     * @return DefaultFlatPagination<OAuthGrant>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Revoke an OAuth grant
     *
     * @param string $id OAuth grant ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
