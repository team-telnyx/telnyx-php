<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
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
}
