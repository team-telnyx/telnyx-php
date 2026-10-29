<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits;
use Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy;
use Telnyx\BrowserSessions\BrowserSessionDeleteResponse;
use Telnyx\BrowserSessions\BrowserSessionGetArtifactResponse;
use Telnyx\BrowserSessions\BrowserSessionGetResponse;
use Telnyx\BrowserSessions\BrowserSessionListParams\Status;
use Telnyx\BrowserSessions\BrowserSessionListResponse;
use Telnyx\BrowserSessions\BrowserSessionNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PolicyShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy
 * @phpstan-import-type LimitsShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrowserSessionsContract
{
    /**
     * @api
     *
     * @param Policy|PolicyShape $policy
     * @param string $idempotencyKey Scoped to the organization. The same key and identical normalized policy, limits, and metadata replay the existing session (HTTP 201); a different request returns 409 idempotency_conflict. Replays do not restart terminal sessions.
     * @param Limits|LimitsShape $limits
     * @param array<string,mixed> $metadata arbitrary key-value metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Policy|array $policy,
        ?string $idempotencyKey = null,
        Limits|array|null $limits = null,
        ?array $metadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): BrowserSessionNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrowserSessionGetResponse;

    /**
     * @api
     *
     * @param Status|value-of<Status> $status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): BrowserSessionListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrowserSessionDeleteResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveArtifact(
        string $artifactID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): BrowserSessionGetArtifactResponse;
}
