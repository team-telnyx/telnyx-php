<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact\Content;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact\ModelProvenance;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact\Status;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact\Type;

/**
 * @phpstan-import-type ContentShape from \Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact\Content
 * @phpstan-import-type ModelProvenanceShape from \Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact\ModelProvenance
 *
 * @phpstan-type MeetingSessionArtifactShape = array{
 *   id: string,
 *   content: null|Content|ContentShape,
 *   createdAt: \DateTimeInterface,
 *   failureReason: string|null,
 *   modelProvenance: null|ModelProvenance|ModelProvenanceShape,
 *   sessionID: string,
 *   status: Status|value-of<Status>,
 *   type: Type|value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class MeetingSessionArtifact implements BaseModel
{
    /** @use SdkModel<MeetingSessionArtifactShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?Content $content;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('failure_reason')]
    public ?string $failureReason;

    #[Required('model_provenance')]
    public ?ModelProvenance $modelProvenance;

    #[Required('session_id')]
    public string $sessionID;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new MeetingSessionArtifact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionArtifact::with(
     *   id: ...,
     *   content: ...,
     *   createdAt: ...,
     *   failureReason: ...,
     *   modelProvenance: ...,
     *   sessionID: ...,
     *   status: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionArtifact)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withCreatedAt(...)
     *   ->withFailureReason(...)
     *   ->withModelProvenance(...)
     *   ->withSessionID(...)
     *   ->withStatus(...)
     *   ->withType(...)
     *   ->withUpdatedAt(...)
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
     * @param Content|ContentShape|null $content
     * @param ModelProvenance|ModelProvenanceShape|null $modelProvenance
     * @param Status|value-of<Status> $status
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        Content|array|null $content,
        \DateTimeInterface $createdAt,
        ?string $failureReason,
        ModelProvenance|array|null $modelProvenance,
        string $sessionID,
        Status|string $status,
        Type|string $type,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['content'] = $content;
        $self['createdAt'] = $createdAt;
        $self['failureReason'] = $failureReason;
        $self['modelProvenance'] = $modelProvenance;
        $self['sessionID'] = $sessionID;
        $self['status'] = $status;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Content|ContentShape|null $content
     */
    public function withContent(Content|array|null $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withFailureReason(?string $failureReason): self
    {
        $self = clone $this;
        $self['failureReason'] = $failureReason;

        return $self;
    }

    /**
     * @param ModelProvenance|ModelProvenanceShape|null $modelProvenance
     */
    public function withModelProvenance(
        ModelProvenance|array|null $modelProvenance
    ): self {
        $self = clone $this;
        $self['modelProvenance'] = $modelProvenance;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
