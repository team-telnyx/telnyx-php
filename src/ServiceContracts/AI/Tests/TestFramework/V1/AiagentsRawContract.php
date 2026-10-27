<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentListParams;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentUpdateParams;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\TestAgent;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AiagentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AiagentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestAgent>
     *
     * @throws APIException
     */
    public function create(
        array|AiagentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestAgent>
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the test agent
     * @param array<string,mixed>|AiagentUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestAgent>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|AiagentUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AiagentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AiagentListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AiagentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
