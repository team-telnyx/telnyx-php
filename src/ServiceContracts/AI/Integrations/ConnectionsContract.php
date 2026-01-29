<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Integrations;

use Telnyx\AI\Integrations\Connections\ConnectionGetResponse;
use Telnyx\AI\Integrations\Connections\ConnectionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConnectionsContract
{
    /**
     * @api
     *
     * @param string $userConnectionID The connection id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $userConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): ConnectionGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): ConnectionListResponse;

    /**
     * @api
     *
     * @param string $userConnectionID The user integration connection identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
