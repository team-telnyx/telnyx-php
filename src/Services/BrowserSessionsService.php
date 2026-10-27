<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits;
use Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy;
use Telnyx\BrowserSessions\BrowserSessionDeleteResponse;
use Telnyx\BrowserSessions\BrowserSessionGetArtifactResponse;
use Telnyx\BrowserSessions\BrowserSessionGetResponse;
use Telnyx\BrowserSessions\BrowserSessionListParams\Status;
use Telnyx\BrowserSessions\BrowserSessionListResponse;
use Telnyx\BrowserSessions\BrowserSessionNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BrowserSessionsContract;
use Telnyx\Services\BrowserSessions\ActionsService;

/**
 * @phpstan-import-type PolicyShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy
 * @phpstan-import-type LimitsShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BrowserSessionsService implements BrowserSessionsContract
{
    /**
     * @api
     */
    public BrowserSessionsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrowserSessionsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates an isolated browser session with network access restricted to the domains you allow.
     *
     * @param Policy|PolicyShape $policy
     * @param string $idempotencyKey Scoped to the organization. The same key and identical normalized policy, limits, and metadata replay the existing session (HTTP 201); a different request returns 409 idempotency_conflict. Replays do not restart terminal sessions.
     * @param Limits|LimitsShape $limits
     * @param mixed $metadata arbitrary key-value metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Policy|array $policy,
        ?string $idempotencyKey = null,
        Limits|array|null $limits = null,
        mixed $metadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): BrowserSessionNewResponse {
        $params = array_filter(
            [
                'policy' => $policy,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
                'limits' => $limits ?? Omitted::VALUE,
                'metadata' => $metadata ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the current status of a browser session.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrowserSessionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists sessions for the authenticated org. Optional status filter.
     *
     * @param Status|value-of<Status> $status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): BrowserSessionListResponse {
        $params = array_filter(
            ['status' => $status ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Closes a ready session and releases its resources. An already closed, failed, or expired session is returned unchanged; a provisioning session returns 409 session_not_ready.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrowserSessionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns artifact metadata and a signed download URL. The download URL requires Bearer auth.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveArtifact(
        string $artifactID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): BrowserSessionGetArtifactResponse {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveArtifact($artifactID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
