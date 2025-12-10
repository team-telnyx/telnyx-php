<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter\Type;
use Telnyx\MobilePushCredentials\PushCredential;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePushCredentialsContract;

final class MobilePushCredentialsService implements MobilePushCredentialsContract
{
    /**
     * @api
     */
    public MobilePushCredentialsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MobilePushCredentialsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new mobile push credential
     *
     * @param array<string,mixed> $createMobilePushCredentialRequest
     *
     * @throws APIException
     */
    public function create(
        array $createMobilePushCredentialRequest,
        ?RequestOptions $requestOptions = null,
    ): PushCredentialResponse {
        $params = Util::removeNulls(
            [
                'createMobilePushCredentialRequest' => $createMobilePushCredentialRequest,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves mobile push credential based on the given `push_credential_id`
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): PushCredentialResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($pushCredentialID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List mobile push credentials
     *
     * @param array{
     *   alias?: string, type?: 'ios'|'android'|Type
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<PushCredential>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a mobile push credential based on the given `push_credential_id`
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($pushCredentialID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
