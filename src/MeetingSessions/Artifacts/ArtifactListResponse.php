<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MeetingSessionArtifactShape from \Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact
 *
 * @phpstan-type ArtifactListResponseShape = array{
 *   data: list<MeetingSessionArtifact|MeetingSessionArtifactShape>
 * }
 */
final class ArtifactListResponse implements BaseModel
{
    /** @use SdkModel<ArtifactListResponseShape> */
    use SdkModel;

    /** @var list<MeetingSessionArtifact> $data */
    #[Required(list: MeetingSessionArtifact::class)]
    public array $data;

    /**
     * `new ArtifactListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtifactListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtifactListResponse)->withData(...)
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
     * @param list<MeetingSessionArtifact|MeetingSessionArtifactShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<MeetingSessionArtifact|MeetingSessionArtifactShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
