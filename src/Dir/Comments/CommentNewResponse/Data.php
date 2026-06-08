<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments\CommentNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\Comments\CommentNewResponse\Data\AuthorRole;
use Telnyx\Dir\Comments\CommentNewResponse\Data\CommentType;
use Telnyx\Dir\Comments\CommentNewResponse\Data\EntityType;
use Telnyx\Dir\Comments\CommentNewResponse\Data\Visibility;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   authorName?: string|null,
 *   authorRole?: null|AuthorRole|value-of<AuthorRole>,
 *   commentType?: null|CommentType|value-of<CommentType>,
 *   content?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   entityType?: null|EntityType|value-of<EntityType>,
 *   visibility?: null|Visibility|value-of<Visibility>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Display name of the author. May be `null`.
     */
    #[Optional('author_name', nullable: true)]
    public ?string $authorName;

    /**
     * Who wrote the comment. `admin` covers the Telnyx vetting team.
     *
     * @var value-of<AuthorRole>|null $authorRole
     */
    #[Optional('author_role', enum: AuthorRole::class)]
    public ?string $authorRole;

    /**
     * Comment categorisation. Customers post `customer_inquiry`. The Telnyx team posts `vetting_comment`, `rejection_reason`, `notification`, `status_update`, or `admin_response`. `internal_note` is filtered out of customer-visible responses.
     *
     * @var value-of<CommentType>|null $commentType
     */
    #[Optional('comment_type', enum: CommentType::class)]
    public ?string $commentType;

    #[Optional]
    public ?string $content;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Resource the comment is attached to. Always `dir` on this endpoint.
     *
     * @var value-of<EntityType>|null $entityType
     */
    #[Optional('entity_type', enum: EntityType::class)]
    public ?string $entityType;

    /**
     * Always `customer` on this endpoint - internal-only comments are filtered out.
     *
     * @var value-of<Visibility>|null $visibility
     */
    #[Optional(enum: Visibility::class)]
    public ?string $visibility;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AuthorRole|value-of<AuthorRole>|null $authorRole
     * @param CommentType|value-of<CommentType>|null $commentType
     * @param EntityType|value-of<EntityType>|null $entityType
     * @param Visibility|value-of<Visibility>|null $visibility
     */
    public static function with(
        ?string $id = null,
        ?string $authorName = null,
        AuthorRole|string|null $authorRole = null,
        CommentType|string|null $commentType = null,
        ?string $content = null,
        ?\DateTimeInterface $createdAt = null,
        EntityType|string|null $entityType = null,
        Visibility|string|null $visibility = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $authorName && $self['authorName'] = $authorName;
        null !== $authorRole && $self['authorRole'] = $authorRole;
        null !== $commentType && $self['commentType'] = $commentType;
        null !== $content && $self['content'] = $content;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $entityType && $self['entityType'] = $entityType;
        null !== $visibility && $self['visibility'] = $visibility;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Display name of the author. May be `null`.
     */
    public function withAuthorName(?string $authorName): self
    {
        $self = clone $this;
        $self['authorName'] = $authorName;

        return $self;
    }

    /**
     * Who wrote the comment. `admin` covers the Telnyx vetting team.
     *
     * @param AuthorRole|value-of<AuthorRole> $authorRole
     */
    public function withAuthorRole(AuthorRole|string $authorRole): self
    {
        $self = clone $this;
        $self['authorRole'] = $authorRole;

        return $self;
    }

    /**
     * Comment categorisation. Customers post `customer_inquiry`. The Telnyx team posts `vetting_comment`, `rejection_reason`, `notification`, `status_update`, or `admin_response`. `internal_note` is filtered out of customer-visible responses.
     *
     * @param CommentType|value-of<CommentType> $commentType
     */
    public function withCommentType(CommentType|string $commentType): self
    {
        $self = clone $this;
        $self['commentType'] = $commentType;

        return $self;
    }

    public function withContent(string $content): self
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

    /**
     * Resource the comment is attached to. Always `dir` on this endpoint.
     *
     * @param EntityType|value-of<EntityType> $entityType
     */
    public function withEntityType(EntityType|string $entityType): self
    {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    /**
     * Always `customer` on this endpoint - internal-only comments are filtered out.
     *
     * @param Visibility|value-of<Visibility> $visibility
     */
    public function withVisibility(Visibility|string $visibility): self
    {
        $self = clone $this;
        $self['visibility'] = $visibility;

        return $self;
    }
}
