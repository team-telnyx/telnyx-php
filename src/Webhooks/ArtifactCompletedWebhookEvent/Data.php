<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ArtifactCompletedWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data\Content;
use Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data\ModelProvenance;
use Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data\Type;

/**
 * Completed artifact, including its generated content.
 *
 * @phpstan-import-type ContentShape from \Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data\Content
 * @phpstan-import-type ModelProvenanceShape from \Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data\ModelProvenance
 *
 * @phpstan-type DataShape = array{
 *   artifactID: string,
 *   content: Content|ContentShape,
 *   modelProvenance: ModelProvenance|ModelProvenanceShape,
 *   sessionID: string,
 *   type: Type|value-of<Type>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Id of the completed artifact.
     */
    #[Required('artifact_id')]
    public string $artifactID;

    /**
     * Generated artifact content.
     */
    #[Required]
    public Content $content;

    /**
     * Model that generated the artifact.
     */
    #[Required('model_provenance')]
    public ModelProvenance $modelProvenance;

    /**
     * The meeting session this event belongs to.
     */
    #[Required('session_id')]
    public string $sessionID;

    /**
     * Type of the completed artifact.
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
     * Data::with(
     *   artifactID: ..., content: ..., modelProvenance: ..., sessionID: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withArtifactID(...)
     *   ->withContent(...)
     *   ->withModelProvenance(...)
     *   ->withSessionID(...)
     *   ->withType(...)
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
     * @param Content|ContentShape $content
     * @param ModelProvenance|ModelProvenanceShape $modelProvenance
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $artifactID,
        Content|array $content,
        ModelProvenance|array $modelProvenance,
        string $sessionID,
        Type|string $type,
    ): self {
        $self = new self;

        $self['artifactID'] = $artifactID;
        $self['content'] = $content;
        $self['modelProvenance'] = $modelProvenance;
        $self['sessionID'] = $sessionID;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Id of the completed artifact.
     */
    public function withArtifactID(string $artifactID): self
    {
        $self = clone $this;
        $self['artifactID'] = $artifactID;

        return $self;
    }

    /**
     * Generated artifact content.
     *
     * @param Content|ContentShape $content
     */
    public function withContent(Content|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * Model that generated the artifact.
     *
     * @param ModelProvenance|ModelProvenanceShape $modelProvenance
     */
    public function withModelProvenance(
        ModelProvenance|array $modelProvenance
    ): self {
        $self = clone $this;
        $self['modelProvenance'] = $modelProvenance;

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
     * Type of the completed artifact.
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
