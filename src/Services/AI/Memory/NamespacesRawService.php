<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceCreateParams;
use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceListResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceNewResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\NamespacesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NamespacesRawService implements NamespacesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a namespace. An organization can have at most five, `default` among them — a sixth returns `403`.
     *
     * @param array{name: string}|NamespaceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NamespaceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NamespaceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/memory/namespaces',
            body: (object) $parsed,
            options: $options,
            convert: NamespaceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Whether a write has finished. Both `ingest` and `remember` return an `operation_id`, and a memory is not recallable until its operation completes — extraction, embedding and consolidation all run first.
     *
     * @param array{namespace: string}|NamespaceRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $operationID,
        array|NamespaceRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NamespaceRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/memory/namespaces/%1$s/operations/%2$s', $namespace, $operationID,
            ],
            options: $options,
            convert: NamespaceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Every namespace in your organization, `default` among them.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/memory/namespaces',
            options: $requestOptions,
            convert: NamespaceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a namespace and every profile and memory in it. `default` cannot be deleted. This cannot be undone.
     *
     * @param string $namespace The namespace to delete. `default` cannot be deleted.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $namespace,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/memory/namespaces/%1$s', $namespace],
            options: $requestOptions,
            convert: null,
        );
    }
}
