<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Kvs;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Kvs\Keys\KeyDeleteParams;
use Telnyx\Storage\Kvs\Keys\KeyListParams;
use Telnyx\Storage\Kvs\Keys\KeyListResponse;
use Telnyx\Storage\Kvs\Keys\KeyRetrieveParams;
use Telnyx\Storage\Kvs\Keys\KeySetParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KeysRawContract
{
    /**
     * @api
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`; URL-encode it so the whole string is treated as one key (for example `user/1` -> `user%2F1`).
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
     * @param string $id KV namespace ID
     * @param array<string,mixed>|KeyListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $key Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`; URL-encode it so the whole string is treated as one key (for example `user/1` -> `user%2F1`).
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

    /**
     * @api
     *
     * @param string $key Path param: Key name. Allowed characters: `a-z A-Z 0-9 - _ / = .`; maximum 256 characters; names starting with `_` are reserved for system use. May contain `/`; URL-encode it so the whole string is treated as one key (for example `user/1` -> `user%2F1`).
     * @param array<string,mixed>|KeySetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function set(
        string $key,
        array|KeySetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
