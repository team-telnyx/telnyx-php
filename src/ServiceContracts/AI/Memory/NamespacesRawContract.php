<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceCreateParams;
use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceListResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceNewResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NamespacesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NamespaceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NamespaceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NamespaceRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
