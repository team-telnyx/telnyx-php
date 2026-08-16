<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ArtifactFailedWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ArtifactFailedWebhookEvent\Data\Type;

/**
 * Failed artifact reference and reason.
 *
 * @phpstan-type DataShape = array{
 *   artifactID: string, sessionID: string, type: Type|value-of<Type>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Id of the failed artifact.
     */
    #[Required('artifact_id')]
    public string $artifactID;

    /**
     * The meeting session this event belongs to.
     */
    #[Required('session_id')]
    public string $sessionID;

    /**
     * Type of the failed artifact.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(artifactID: ..., sessionID: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withArtifactID(...)->withSessionID(...)->withType(...)
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
    public static function with(
        string $artifactID,
        string $sessionID,
        Type|string $type
    ): self {
        $self = new self;

        $self['artifactID'] = $artifactID;
        $self['sessionID'] = $sessionID;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Id of the failed artifact.
     */
    public function withArtifactID(string $artifactID): self
    {
        $self = clone $this;
        $self['artifactID'] = $artifactID;

        return $self;
    }

    /**
     * The meeting session this event belongs to.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Type of the failed artifact.
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
