<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a single meeting session artifact by ID.
 *
 * @see Telnyx\Services\MeetingSessions\ArtifactsService::retrieve()
 *
 * @phpstan-type ArtifactRetrieveParamsShape = array{id: string}
 */
final class ArtifactRetrieveParams implements BaseModel
{
    /** @use SdkModel<ArtifactRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new ArtifactRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtifactRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtifactRetrieveParams)->withID(...)
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
     */
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
