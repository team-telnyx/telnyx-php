<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingSessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * Requests asynchronous generation of one artifact: `summary`, `action_items`, `decisions`, `topics`, `open_questions`, or `custom`. Each request produces one artifact. `custom` is answered from a `prompt` you supply, which is required for `custom` and rejected on the five named types. Generation requires transcript content and configured inference and currently reads at most the first 10,000 segments, so exceptionally long transcripts may produce incomplete artifacts or fail model limits. **Not idempotent, and every call is billed**: each request is a separate inference run, so a retry or a duplicate POST produces a second artifact and a second charge. Guard the call rather than relying on the service to collapse it. The automatic `summarize_on_end` attempt is billed on the same basis.
     *
     * @param string $id unique identifier for the meeting session
     * @param string $prompt An open-ended request answered from the transcript. Required when `type` is `custom`, and rejected with 400 on any named type. Trimmed before storage and echoed back in artifact responses and the `artifact.completed` webhook.
     * @param 'custom' $type answered from the `prompt` below rather than a fixed question
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $prompt,
        string $type = 'custom',
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionArtifactResponse {
        $params = ['type' => $type, 'prompt' => $prompt];

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
        $params = ['id' => $id];

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
