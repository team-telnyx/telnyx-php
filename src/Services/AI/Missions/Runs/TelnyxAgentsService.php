<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentLinkResponse;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\Runs\TelnyxAgentsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TelnyxAgentsService implements TelnyxAgentsContract
{
    /**
     * @api
     */
    public TelnyxAgentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TelnyxAgentsRawService($client);
    }

    /**
     * @api
     *
     * List all Telnyx agents linked to a run
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): TelnyxAgentListResponse {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Link a Telnyx AI agent (voice/messaging) to a run
     *
     * @param string $runID Path param
     * @param string $missionID Path param
     * @param string $telnyxAgentID Body param: The Telnyx AI agent ID to link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function link(
        string $runID,
        string $missionID,
        string $telnyxAgentID,
        RequestOptions|array|null $requestOptions = null,
    ): TelnyxAgentLinkResponse {
        $params = Util::removeNulls(
            ['missionID' => $missionID, 'telnyxAgentID' => $telnyxAgentID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->link($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unlink a Telnyx agent from a run
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unlink(
        string $telnyxAgentID,
        string $missionID,
        string $runID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID, 'runID' => $runID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unlink($telnyxAgentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
