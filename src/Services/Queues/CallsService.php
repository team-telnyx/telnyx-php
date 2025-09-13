<?php

declare(strict_types=1);

namespace Telnyx\Services\Queues;

use Telnyx\Client;
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
     */
    public function retrieve(
        string $callControlID,
        $queueName,
        ?RequestOptions $requestOptions = null
    ): CallGetResponse {
        [$parsed, $options] = CallRetrieveParams::parseRequest(
            ['queueName' => $queueName],
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
     */
    public function list(
        string $queueName,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CallListResponse {
        [$parsed, $options] = CallListParams::parseRequest(
            ['page' => $page],
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
