<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
        $this->actions = new ActionsService($this->client);
    }

    /**
     * @api
     *
     * Initiates phone number verification procedure.
     *
     * @param string $phoneNumber
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod verification method
     */
    public function create(
        $phoneNumber,
        $verificationMethod,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberNewResponse {
        [$parsed, $options] = VerifiedNumberCreateParams::parseRequest(
            [
                'phoneNumber' => $phoneNumber,
                'verificationMethod' => $verificationMethod,
            ],
            $requestOptions,
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
     */
    public function retrieve(
        string $phoneNumber,
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
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberListResponse {
        [$parsed, $options] = VerifiedNumberListParams::parseRequest(
            ['page' => $page],
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
     */
    public function delete(
        string $phoneNumber,
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
