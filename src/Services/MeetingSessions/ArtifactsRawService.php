<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingSessions;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\Artifacts\ArtifactCreateParams;
use Telnyx\MeetingSessions\Artifacts\ArtifactListResponse;
use Telnyx\MeetingSessions\Artifacts\ArtifactRetrieveParams;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifactResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessions\ArtifactsRawContract;

/**
 * Create and retrieve asynchronous summaries and action-item artifacts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ArtifactsRawService implements ArtifactsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Requests asynchronous generation of one artifact: `summary`, `action_items`, `decisions`, `topics`, `open_questions`, or `custom`. Each request produces one artifact. `custom` is answered from a `prompt` you supply, which is required for `custom` and rejected on the five named types. Generation requires transcript content and configured inference and currently reads at most the first 10,000 segments, so exceptionally long transcripts may produce incomplete artifacts or fail model limits. **Not idempotent, and every call is billed**: each request is a separate inference run, so a retry or a duplicate POST produces a second artifact and a second charge. Guard the call rather than relying on the service to collapse it. The automatic `summarize_on_end` attempt is billed on the same basis.
     *
     * @param string $id unique identifier for the meeting session
     * @param array{type?: 'custom', prompt: string}|ArtifactCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionArtifactResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|ArtifactCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ArtifactCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['meeting_sessions/%1$s/artifacts', $id],
            body: (object) $parsed,
            options: $options,
            convert: MeetingSessionArtifactResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a single meeting session artifact by ID.
     *
     * @param string $artifactID unique identifier for a meeting session artifact
     * @param array{id: string}|ArtifactRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionArtifactResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $artifactID,
        array|ArtifactRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ArtifactRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['meeting_sessions/%1$s/artifacts/%2$s', $id, $artifactID],
            options: $options,
            convert: MeetingSessionArtifactResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of artifacts for a meeting session.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ArtifactListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['meeting_sessions/%1$s/artifacts', $id],
            options: $requestOptions,
            convert: ArtifactListResponse::class,
        );
    }
}
