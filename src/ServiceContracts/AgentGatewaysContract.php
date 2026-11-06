<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AgentGateways\AgentGateway;
use Telnyx\AgentGateways\AgentGatewayGetModelsResponse;
use Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse;
use Telnyx\AgentGateways\AgentGatewayResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgentGatewaysContract
{
    /**
     * @api
     *
     * @param string $wireguardInterfaceID One of the account's WireGuard Interfaces. The instance joins it as a peer, and the interface's other peers reach the instance.
     * @param string|Omitted|null $name a label for people
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $wireguardInterfaceID,
        string|Omitted|null $name = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): AgentGatewayResponse;

    /**
     * @api
     *
     * @param int $pageNumber the page to return, counting from 1
     * @param int $pageSize results per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AgentGateway>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 50,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): AgentGatewayResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveModels(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): AgentGatewayGetModelsResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param \DateTimeInterface $end The window's end, an RFC 3339 timestamp with an offset. Defaults to now.
     * @param string $keyID only the requests made with this key
     * @param int $pageNumber the page to return, counting from 1
     * @param int $pageSize results per page
     * @param \DateTimeInterface $start The window's start, an RFC 3339 timestamp with an offset. Defaults to 24 hours before `end`.
     * @param string $teamID only the requests made with this team's keys
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSpendLogs(
        string $instanceID,
        ?\DateTimeInterface $end = null,
        ?string $keyID = null,
        int $pageNumber = 1,
        int $pageSize = 50,
        ?\DateTimeInterface $start = null,
        ?string $teamID = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayGetSpendLogsResponse;
}
