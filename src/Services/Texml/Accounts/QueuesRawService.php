<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\QueuesRawContract;
use Telnyx\Texml\Accounts\Queues\QueueCreateParams;
use Telnyx\Texml\Accounts\Queues\QueueDeleteParams;
use Telnyx\Texml\Accounts\Queues\QueueGetResponse;
use Telnyx\Texml\Accounts\Queues\QueueNewResponse;
use Telnyx\Texml\Accounts\Queues\QueueRetrieveParams;
use Telnyx\Texml\Accounts\Queues\QueueUpdateParams;
use Telnyx\Texml\Accounts\Queues\QueueUpdateResponse;

final class QueuesRawService implements QueuesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new queue resource.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array{friendlyName?: string, maxSize?: int}|QueueCreateParams $params
     *
     * @return BaseResponse<QueueNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $accountSid,
        array|QueueCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/Accounts/%1$s/Queues', $accountSid],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: QueueNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a queue resource.
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param array{accountSid: string}|QueueRetrieveParams $params
     *
     * @return BaseResponse<QueueGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueSid,
        array|QueueRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Queues/%2$s', $accountSid, $queueSid],
            options: $options,
            convert: QueueGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a queue resource.
     *
     * @param string $queueSid path param: The QueueSid that identifies the call queue
     * @param array{accountSid: string, maxSize?: int}|QueueUpdateParams $params
     *
     * @return BaseResponse<QueueUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $queueSid,
        array|QueueUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/Accounts/%1$s/Queues/%2$s', $accountSid, $queueSid],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: QueueUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a queue resource.
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param array{accountSid: string}|QueueDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $queueSid,
        array|QueueDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['texml/Accounts/%1$s/Queues/%2$s', $accountSid, $queueSid],
            options: $options,
            convert: null,
        );
    }
}
