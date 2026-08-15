<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MeetingSessions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\Artifacts\ArtifactCreateParams\Type;
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
     * @param Type|value-of<Type> $type type of artifact to generate from the session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        Type|string $type,
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
