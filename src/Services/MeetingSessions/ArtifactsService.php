<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingSessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MeetingSessions\Artifacts\ArtifactCreateParams\Type;
use Telnyx\MeetingSessions\Artifacts\ArtifactListResponse;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifactResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessions\ArtifactsContract;

/**
 * Create and retrieve asynchronous summaries and action-item artifacts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ArtifactsService implements ArtifactsContract
{
    /**
     * @api
     */
    public ArtifactsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ArtifactsRawService($client);
    }

    /**
     * @api
     *
     * Requests asynchronous generation of one `summary` or `action_items` artifact. Each type requires its own request. Generation requires transcript content and configured inference and currently reads at most the first 10,000 segments, so exceptionally long transcripts may produce incomplete artifacts or fail model limits.
     *
     * @param string $id unique identifier for the meeting session
     * @param Type|value-of<Type> $type type of artifact to generate from the session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        Type|string $type,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionArtifactResponse {
        $params = Util::removeNulls(['type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a single meeting session artifact by ID.
     *
     * @param string $artifactID unique identifier for a meeting session artifact
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $artifactID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionArtifactResponse {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($artifactID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of artifacts for a meeting session.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ArtifactListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
