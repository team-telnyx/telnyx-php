<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Integrations\IntegrationGetResponse;
use Telnyx\AI\Integrations\IntegrationListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface IntegrationsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $integrationID,
        ?RequestOptions $requestOptions = null
    ): IntegrationGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): IntegrationListResponse;
}
