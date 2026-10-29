<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BrowserSessions\BrowserSessionCreateParams;
use Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits;
use Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy;
use Telnyx\BrowserSessions\BrowserSessionDeleteResponse;
use Telnyx\BrowserSessions\BrowserSessionGetArtifactResponse;
use Telnyx\BrowserSessions\BrowserSessionGetResponse;
use Telnyx\BrowserSessions\BrowserSessionListParams;
use Telnyx\BrowserSessions\BrowserSessionListParams\Status;
use Telnyx\BrowserSessions\BrowserSessionListResponse;
use Telnyx\BrowserSessions\BrowserSessionNewResponse;
use Telnyx\BrowserSessions\BrowserSessionRetrieveArtifactParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BrowserSessionsRawContract;

/**
 * @phpstan-import-type PolicyShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy
 * @phpstan-import-type LimitsShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BrowserSessionsRawService implements BrowserSessionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an isolated browser session with network access restricted to the domains you allow.
     *
     * @param array{
     *   policy: Policy|PolicyShape,
     *   idempotencyKey?: string,
     *   limits?: Limits|LimitsShape,
     *   metadata?: array<string,mixed>,
     * }|BrowserSessionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BrowserSessionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrowserSessionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'browser_sessions',
            body: (object) $parsed,
            options: $options,
            convert: BrowserSessionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the current status of a browser session.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['browser_sessions/%1$s', $id],
            options: $requestOptions,
            convert: BrowserSessionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists sessions for the authenticated org. Optional status filter.
     *
     * @param array{status?: Status|value-of<Status>}|BrowserSessionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BrowserSessionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrowserSessionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'browser_sessions',
            query: $parsed,
            options: $options,
            convert: BrowserSessionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Closes a ready session and releases its resources. An already closed, failed, or expired session is returned unchanged; a provisioning session returns 409 session_not_ready.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['browser_sessions/%1$s', $id],
            options: $requestOptions,
            convert: BrowserSessionDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns artifact metadata and a signed download URL. The download URL requires Bearer auth.
     *
     * @param array{id: string}|BrowserSessionRetrieveArtifactParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionGetArtifactResponse>
     *
     * @throws APIException
     */
    public function retrieveArtifact(
        string $artifactID,
        array|BrowserSessionRetrieveArtifactParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrowserSessionRetrieveArtifactParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['browser_sessions/%1$s/artifacts/%2$s', $id, $artifactID],
            options: $options,
            convert: BrowserSessionGetArtifactResponse::class,
        );
    }
}
