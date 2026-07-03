<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Kvs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\Core\Util;
use Telnyx\CursorFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Kvs\KeysContract;
use Telnyx\Storage\Kvs\Keys\KeyListResponse;

/**
 * Read and write keys within a KV namespace.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class KeysService implements KeysContract
{
    /**
     * @api
     */
    public KeysRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KeysRawService($client);
    }

    /**
     * @api
     *
     * Returns the raw stored value for a key. The response body is the value exactly as it was written; the `Content-Type` header echoes the value's stored content type (defaults to `application/octet-stream`).
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $key,
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($key, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates or replaces the value for a key. The request body is stored verbatim as the value — no base64, no JSON envelope — up to 1 MiB. The request's `Content-Type` header is stored with the value and echoed back on retrieval. Returns `201` when the key is created and `200` when an existing key is updated.
     *
     * @param string $key Path param: Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param string|FileParam $body body param: Raw value bytes, stored verbatim
     * @param string $id Path param: KV namespace ID
     * @param int $ttlSecs Query param: Time-to-live in seconds. When set, the key expires and is deleted after this duration. Requires a namespace provisioned with TTL support; namespaces without it return a `409`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $key,
        string|FileParam $body,
        string $id,
        ?int $ttlSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['id' => $id, 'ttlSecs' => $ttlSecs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($key, $body, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the keys in a namespace. Returns key names and metadata only, never values. Results are paginated with `limit` and an opaque `cursor`.
     *
     * @param string $id KV namespace ID
     * @param string $cursor Opaque pagination cursor from a previous response's `meta.cursor`.
     * @param int $limit Maximum number of keys to return. Values above 1000 are treated as 1000.
     * @param string $prefix return only keys that start with this prefix
     * @param RequestOpts|null $requestOptions
     *
     * @return CursorFlatPagination<KeyListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?string $cursor = null,
        int $limit = 1000,
        ?string $prefix = null,
        RequestOptions|array|null $requestOptions = null,
    ): CursorFlatPagination {
        $params = Util::removeNulls(
            ['cursor' => $cursor, 'limit' => $limit, 'prefix' => $prefix]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a key. Idempotent: deleting a key that does not exist still succeeds. The namespace itself must exist and be provisioned.
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $key,
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($key, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
