<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionResponse\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ArtifactShape = array{
 *   artifactID?: string|null, contentType?: string|null, sizeBytes?: int|null
 * }
 */
final class Artifact implements BaseModel
{
    /** @use SdkModel<ArtifactShape> */
    use SdkModel;

    #[Optional('artifact_id')]
    public ?string $artifactID;

    #[Optional('content_type')]
    public ?string $contentType;

    #[Optional('size_bytes')]
    public ?int $sizeBytes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $artifactID = null,
        ?string $contentType = null,
        ?int $sizeBytes = null
    ): self {
        $self = new self;

        null !== $artifactID && $self['artifactID'] = $artifactID;
        null !== $contentType && $self['contentType'] = $contentType;
        null !== $sizeBytes && $self['sizeBytes'] = $sizeBytes;

        return $self;
    }

    public function withArtifactID(string $artifactID): self
    {
        $self = clone $this;
        $self['artifactID'] = $artifactID;

        return $self;
    }

    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    public function withSizeBytes(int $sizeBytes): self
    {
        $self = clone $this;
        $self['sizeBytes'] = $sizeBytes;

        return $self;
    }
}
