<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentLinkParams;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentLinkResponse;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentListParams;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentListResponse;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentUnlinkParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\Runs\TelnyxAgentsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TelnyxAgentsRawService implements TelnyxAgentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Telnyx agents linked to a run
     *
     * @param array{missionID: string}|TelnyxAgentListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = TelnyxAgentListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/runs/%2$s/telnyx-agents', $missionID, $runID],
            options: $options,
            convert: TelnyxAgentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Link a Telnyx AI agent (voice/messaging) to a run
     *
     * @param string $runID Path param
     * @param array{
     *   missionID: string, telnyxAgentID: string
     * }|TelnyxAgentLinkParams $params
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
    ): BaseResponse {
        [$parsed, $options] = TelnyxAgentLinkParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs/%2$s/telnyx-agents', $missionID, $runID],
            body: (object) array_diff_key($parsed, array_flip(['missionID'])),
            options: $options,
            convert: TelnyxAgentLinkResponse::class,
        );
    }

    /**
     * @api
     *
     * Unlink a Telnyx agent from a run
     *
     * @param array{missionID: string, runID: string}|TelnyxAgentUnlinkParams $params
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
    ): BaseResponse {
        [$parsed, $options] = TelnyxAgentUnlinkParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);
        $runID = $parsed['runID'];
        unset($parsed['runID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'ai/missions/%1$s/runs/%2$s/telnyx-agents/%3$s',
                $missionID,
                $runID,
                $telnyxAgentID,
            ],
            options: $options,
            convert: null,
        );
    }
}
