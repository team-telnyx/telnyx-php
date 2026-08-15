<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MeetingSessions;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\Artifacts\ArtifactCreateParams;
use Telnyx\MeetingSessions\Artifacts\ArtifactListResponse;
use Telnyx\MeetingSessions\Artifacts\ArtifactRetrieveParams;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifactResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ArtifactsRawContract
{
    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param array<string,mixed>|ArtifactCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $artifactID unique identifier for a meeting session artifact
     * @param array<string,mixed>|ArtifactRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
