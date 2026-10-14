<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceListResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceNewResponse;
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
     * @param string $name a name for the new namespace, unique within your organization
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): NamespaceNewResponse;

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

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): NamespaceListResponse;

    /**
     * @api
     *
     * @param string $namespace The namespace to delete. `default` cannot be deleted.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $namespace,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
