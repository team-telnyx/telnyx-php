<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\NamespacesRawContract;

/**
 * Whether a write has finished.
 *
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
}
