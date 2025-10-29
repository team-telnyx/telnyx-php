<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Integrations;

use Telnyx\AI\Integrations\Connections\ConnectionGetResponse;
use Telnyx\AI\Integrations\Connections\ConnectionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ConnectionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): ConnectionListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
