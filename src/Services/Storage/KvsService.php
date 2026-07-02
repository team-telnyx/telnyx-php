<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\KvsContract;
use Telnyx\Services\Storage\Kvs\KeysService;
use Telnyx\Storage\Kvs\KvNamespace;
use Telnyx\Storage\Kvs\KvNamespaceResponseWrapper;

/**
 * Manage KV storage namespaces.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class KvsService implements KvsContract
{
    /**
     * @api
     */
    public KvsRawService $raw;

    /**
     * @api
     */
    public KeysService $keys;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KvsRawService($client);
        $this->keys = new KeysService($client);
    }

    /**
     * @api
     *
     * Creates a new KV namespace. Provisioning is asynchronous: the namespace is returned with status `pending` and becomes usable once it reaches `provision_ok`.
     *
     * @param string $name Namespace name. May contain lowercase letters, numbers, and hyphens only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): KvNamespaceResponseWrapper {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a KV namespace by its ID, including its provisioning status.
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): KvNamespaceResponseWrapper {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the KV namespaces for the authenticated user's organization. Results use page-based pagination (`page[number]`/`page[size]`).
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize The size of the page. Values above 250 are treated as 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<KvNamespace>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a KV namespace and all of the keys it contains. Deletion is asynchronous: the namespace is returned with status `deleting`. Deleting a namespace whose deletion is already in progress returns a `409`.
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): KvNamespaceResponseWrapper {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
