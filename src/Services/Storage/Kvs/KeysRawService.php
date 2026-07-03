<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Kvs;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Kvs\KeysRawContract;
use Telnyx\Storage\Kvs\Keys\KeyDeleteParams;
use Telnyx\Storage\Kvs\Keys\KeyListParams;
use Telnyx\Storage\Kvs\Keys\KeyListResponse;
use Telnyx\Storage\Kvs\Keys\KeyRetrieveParams;
use Telnyx\Storage\Kvs\Keys\KeySetParams;

/**
 * Read and write keys within a KV namespace.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class KeysRawService implements KeysRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the raw stored value for a key. The response body is the value exactly as it was written; the `Content-Type` header echoes the value's stored content type (defaults to `application/octet-stream`).
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param array{id: string}|KeyRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieve(
        string $key,
        array|KeyRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KeyRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['storage/kvs/%1$s/keys/%2$s', $id, $key],
            headers: ['Accept' => 'application/octet-stream'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Lists the keys in a namespace. Returns key names and metadata only, never values. Results are paginated with `limit` and an opaque `cursor`.
     *
     * @param string $id KV namespace ID
     * @param array{
     *   cursor?: string, limit?: int, prefix?: string
     * }|KeyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KeyListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|KeyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KeyListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['storage/kvs/%1$s/keys', $id],
            query: $parsed,
            options: $options,
            convert: KeyListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a key. Idempotent: deleting a key that does not exist still succeeds. The namespace itself must exist and be provisioned.
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param array{id: string}|KeyDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $key,
        array|KeyDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KeyDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['storage/kvs/%1$s/keys/%2$s', $id, $key],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Creates or replaces the value for a key. The request body is stored verbatim as the value — no base64, no JSON envelope — up to 1 MiB. The request's `Content-Type` header is stored with the value and echoed back on retrieval. Returns `201` when the key is created and `200` when an existing key is updated.
     *
     * @param string $key Path param: Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param string|FileParam $body body param: Raw value bytes, stored verbatim
     * @param array{id: string, ttlSecs?: int}|KeySetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function set(
        string $key,
        string|FileParam $body,
        array|KeySetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KeySetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['storage/kvs/%1$s/keys/%2$s', $id, $key],
            query: Util::array_transform_keys(
                array_diff_key($parsed, array_flip(['body'])),
                ['ttlSecs' => 'ttl_secs']
            ),
            headers: ['Content-Type' => 'application/octet-stream'],
            body: $parsed,
            options: $options,
            convert: null,
        );
    }
}
