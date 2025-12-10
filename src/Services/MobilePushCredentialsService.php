<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter\Type;
use Telnyx\MobilePushCredentials\MobilePushCredentialListResponse;
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
     * @param string $alias Alias to uniquely identify the credential
     * @param string $certificate Certificate as received from APNs
     * @param string $privateKey Corresponding private key to the certificate as received from APNs
     * @param 'android'|\Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type $type Type of mobile push credential. Should be <code>android</code> here
     * @param array<string,mixed> $projectAccountJsonFile Private key file in JSON format
     *
     * @throws APIException
     */
    public function create(
        string $alias,
        string $certificate,
        string $privateKey,
        string|\Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type $type,
        array $projectAccountJsonFile,
        ?RequestOptions $requestOptions = null,
    ): PushCredentialResponse {
        $params = Util::removeNulls(
            [
                'alias' => $alias,
                'certificate' => $certificate,
                'privateKey' => $privateKey,
                'type' => $type,
                'projectAccountJsonFile' => $projectAccountJsonFile,
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
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): MobilePushCredentialListResponse {
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
