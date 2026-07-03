<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Kvs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\CursorFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Storage\Kvs\Keys\KeyListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KeysContract
{
    /**
     * @api
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
    ): string;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): CursorFlatPagination;

    /**
     * @api
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
    ): mixed;
}
