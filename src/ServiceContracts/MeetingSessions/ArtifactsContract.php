<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MeetingSessions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\Artifacts\ArtifactListResponse;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifactResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ArtifactsContract
{
    /**
     * @api
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
    ): MeetingSessionArtifactResponse;

    /**
     * @api
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
    ): MeetingSessionArtifactResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ArtifactListResponse;
}
