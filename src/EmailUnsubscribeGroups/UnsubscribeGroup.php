<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroup\RecordType;

/**
 * @phpstan-type UnsubscribeGroupShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   description: string|null,
 *   name: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class UnsubscribeGroup implements BaseModel
{
    /** @use SdkModel<UnsubscribeGroupShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Always present (not omit-nullable); `null` when unset.
     */
    #[Required]
    public ?string $description;

    #[Required]
    public string $name;

    /**
     * View-only.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new UnsubscribeGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnsubscribeGroup::with(
     *   id: ...,
     *   createdAt: ...,
     *   description: ...,
     *   name: ...,
     *   recordType: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnsubscribeGroup)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDescription(...)
     *   ->withName(...)
     *   ->withRecordType(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        ?string $description,
        string $name,
        RecordType|string $recordType,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['description'] = $description;
        $self['name'] = $name;
        $self['recordType'] = $recordType;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Always present (not omit-nullable); `null` when unset.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * View-only.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
