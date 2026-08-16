<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MeetingSessionArtifactShape from \Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact
 *
 * @phpstan-type MeetingSessionArtifactResponseShape = array{
 *   data: MeetingSessionArtifact|MeetingSessionArtifactShape
 * }
 */
final class MeetingSessionArtifactResponse implements BaseModel
{
    /** @use SdkModel<MeetingSessionArtifactResponseShape> */
    use SdkModel;

    #[Required]
    public MeetingSessionArtifact $data;

    /**
     * `new MeetingSessionArtifactResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionArtifactResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionArtifactResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MeetingSessionArtifact|MeetingSessionArtifactShape $data
     */
    public static function with(MeetingSessionArtifact|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MeetingSessionArtifact|MeetingSessionArtifactShape $data
     */
    public function withData(MeetingSessionArtifact|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
