<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Integrations\IntegrationGetResponse;
use Telnyx\AI\Integrations\IntegrationListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IntegrationsRawContract
{
    /**
     * @api
     *
     * @param string $integrationID The integration id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegrationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $integrationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegrationListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
