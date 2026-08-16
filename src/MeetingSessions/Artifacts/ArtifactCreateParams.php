<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\Artifacts\ArtifactCreateParams\Type;

/**
 * Requests asynchronous generation of one `summary` or `action_items` artifact. Each type requires its own request. Generation requires transcript content and configured inference and currently reads at most the first 10,000 segments, so exceptionally long transcripts may produce incomplete artifacts or fail model limits.
 *
 * @see Telnyx\Services\MeetingSessions\ArtifactsService::create()
 *
 * @phpstan-type ArtifactCreateParamsShape = array{type: Type|value-of<Type>}
 */
final class ArtifactCreateParams implements BaseModel
{
    /** @use SdkModel<ArtifactCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Type of artifact to generate from the session.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new ArtifactCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtifactCreateParams::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtifactCreateParams)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(Type|string $type): self
    {
        $self = new self;

        $self['type'] = $type;

        return $self;
    }

    /**
     * Type of artifact to generate from the session.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
