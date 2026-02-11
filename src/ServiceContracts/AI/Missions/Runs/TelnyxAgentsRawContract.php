<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentLinkParams;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentLinkResponse;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentListParams;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentListResponse;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentUnlinkParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TelnyxAgentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TelnyxAgentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxAgentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $runID,
        array|TelnyxAgentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID Path param
     * @param array<string,mixed>|TelnyxAgentLinkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxAgentLinkResponse>
     *
     * @throws APIException
     */
    public function link(
        string $runID,
        array|TelnyxAgentLinkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TelnyxAgentUnlinkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unlink(
        string $telnyxAgentID,
        array|TelnyxAgentUnlinkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
