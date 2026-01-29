<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateAndroidPushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateIosPushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter;
use Telnyx\MobilePushCredentials\PushCredential;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePushCredentialsContract;

/**
 * @phpstan-import-type CreateMobilePushCredentialRequestShape from \Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest
 * @phpstan-import-type FilterShape from \Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param CreateMobilePushCredentialRequestShape $createMobilePushCredentialRequest
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        CreateIosPushCredentialRequest|array|CreateAndroidPushCredentialRequest $createMobilePushCredentialRequest,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PushCredential>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($pushCredentialID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
