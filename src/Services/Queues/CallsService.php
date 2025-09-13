<?php

declare(strict_types=1);

namespace Telnyx\Services\Queues;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams;
use Telnyx\Queues\Calls\CallListParams\Page;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\Queues\Calls\CallRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Queues\CallsContract;

use const Telnyx\Core\OMIT as omit;

final class CallsService implements CallsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve an existing call from an existing queue
     *
     * @param string $queueName
     *
     * @return CallGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        $queueName,
        ?RequestOptions $requestOptions = null
    ): CallGetResponse {
        $params = ['queueName' => $queueName];

        return $this->retrieveRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallGetResponse {
        [$parsed, $options] = CallRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $queueName = $parsed['queueName'];
        unset($parsed['queueName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s/calls/%2$s', $queueName, $callControlID],
            options: $options,
            convert: CallGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the list of calls in an existing queue
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @return CallListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CallListResponse {
        $params = ['page' => $page];

        return $this->listRaw($queueName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $queueName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallListResponse {
        [$parsed, $options] = CallListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s/calls', $queueName],
            query: $parsed,
            options: $options,
            convert: CallListResponse::class,
        );
    }
}
