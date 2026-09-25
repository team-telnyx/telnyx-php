<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NamespacesContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $operationID,
        string $namespace,
        RequestOptions|array|null $requestOptions = null,
    ): NamespaceGetResponse;
}
