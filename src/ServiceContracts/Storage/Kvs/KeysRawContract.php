<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Kvs;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\CursorFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Storage\Kvs\Keys\KeyDeleteParams;
use Telnyx\Storage\Kvs\Keys\KeyListParams;
use Telnyx\Storage\Kvs\Keys\KeyListResponse;
use Telnyx\Storage\Kvs\Keys\KeyRetrieveParams;
use Telnyx\Storage\Kvs\Keys\KeyUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KeysRawContract
{
    /**
     * @api
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param array<string,mixed>|KeyRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $key Path param: Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param string|FileParam $body body param: Raw value bytes, stored verbatim
     * @param array<string,mixed>|KeyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $key,
        string|FileParam $body,
        array|KeyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id KV namespace ID
     * @param array<string,mixed>|KeyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorFlatPagination<KeyListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|KeyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`. When calling the HTTP API directly, URL-encode the key so the whole string is treated as one key (for example `user/1` -> `user%2F1`). SDK users should pass the key raw - SDKs URL-encode path parameters automatically.
     * @param array<string,mixed>|KeyDeleteParams $params
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
    ): BaseResponse;
}
