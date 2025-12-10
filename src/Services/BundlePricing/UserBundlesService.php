<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundle;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleGetResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\UserBundlesContract;

final class UserBundlesService implements UserBundlesContract
{
    /**
     * @api
     */
    public UserBundlesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UserBundlesRawService($client);
    }

    /**
     * @api
     *
     * Creates multiple user bundles for the user.
     *
     * @param string $idempotencyKey Body param: Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     * @param list<array{billingBundleID: string, quantity: int}> $items Body param:
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function create(
        ?string $idempotencyKey = null,
        ?array $items = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleNewResponse {
        $params = Util::removeNulls(
            [
                'idempotencyKey' => $idempotencyKey,
                'items' => $items,
                'authorizationBearer' => $authorizationBearer,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a user bundle by its ID.
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleGetResponse {
        $params = Util::removeNulls(
            ['authorizationBearer' => $authorizationBearer]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($userBundleID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of user bundles.
     *
     * @param array{
     *   countryISO?: list<string>, resource?: list<string>
     * } $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param array{
     *   number?: int, size?: int
     * } $page Query param: Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @return DefaultPagination<UserBundle>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'page' => $page,
                'authorizationBearer' => $authorizationBearer,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deactivates a user bundle by its ID.
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleDeactivateResponse {
        $params = Util::removeNulls(
            ['authorizationBearer' => $authorizationBearer]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deactivate($userBundleID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the resources of a user bundle by its ID.
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResourcesResponse {
        $params = Util::removeNulls(
            ['authorizationBearer' => $authorizationBearer]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listResources($userBundleID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns all user bundles that aren't in use.
     *
     * @param array{
     *   countryISO?: list<string>, resource?: list<string>
     * } $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function listUnused(
        ?array $filter = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListUnusedResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'authorizationBearer' => $authorizationBearer]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listUnused(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
