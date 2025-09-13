<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifiedNumbersContract;
use Telnyx\Services\VerifiedNumbers\ActionsService;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams\Page;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

use const Telnyx\Core\OMIT as omit;

final class VerifiedNumbersService implements VerifiedNumbersContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Initiates phone number verification procedure.
     *
     * @param string $phoneNumber
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod verification method
     *
     * @return VerifiedNumberNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $phoneNumber,
        $verificationMethod,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberNewResponse {
        $params = [
            'phoneNumber' => $phoneNumber, 'verificationMethod' => $verificationMethod,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifiedNumberNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberNewResponse {
        [$parsed, $options] = VerifiedNumberCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'verified_numbers',
            body: (object) $parsed,
            options: $options,
            convert: VerifiedNumberNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a verified number
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper {
        $params = [];

        return $this->retrieveRaw($phoneNumber, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['verified_numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: VerifiedNumberDataWrapper::class,
        );
    }

    /**
     * @api
     *
     * Gets a paginated list of Verified Numbers.
     *
     * @param Page $page Consolidated page parameter (deepObject style). Use page[size] and page[number] in the query string. Originally: page[size], page[number]
     *
     * @return VerifiedNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberListResponse {
        $params = ['page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifiedNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberListResponse {
        [$parsed, $options] = VerifiedNumberListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'verified_numbers',
            query: $parsed,
            options: $options,
            convert: VerifiedNumberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a verified number
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper {
        $params = [];

        return $this->deleteRaw($phoneNumber, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['verified_numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: VerifiedNumberDataWrapper::class,
        );
    }
}
