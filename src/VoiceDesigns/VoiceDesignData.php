<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceDesigns\VoiceDesignData\RecordType;

/**
 * A voice design object with full version detail.
 *
 * @phpstan-type VoiceDesignDataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   prompt?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   text?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   version?: int|null,
 *   versionCreatedAt?: \DateTimeInterface|null,
 *   voiceSampleSize?: int|null,
 * }
 */
final class VoiceDesignData implements BaseModel
{
    /** @use SdkModel<VoiceDesignDataShape> */
    use SdkModel;

    /**
     * Unique identifier for the voice design.
     */
    #[Optional]
    public ?string $id;

    /**
     * Timestamp when the voice design was first created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Name of the voice design.
     */
    #[Optional]
    public ?string $name;

    /**
     * Natural language prompt used to define the voice style for this version.
     */
    #[Optional]
    public ?string $prompt;

    /**
     * Identifies the resource type.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Sample text used to synthesize this version.
     */
    #[Optional]
    public ?string $text;

    /**
     * Timestamp when the voice design was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Version number of this voice design.
     */
    #[Optional]
    public ?int $version;

    /**
     * Timestamp when this specific version was created.
     */
    #[Optional('version_created_at')]
    public ?\DateTimeInterface $versionCreatedAt;

    /**
     * Size of the voice sample audio in bytes.
     */
    #[Optional('voice_sample_size')]
    public ?int $voiceSampleSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $prompt = null,
        RecordType|string|null $recordType = null,
        ?string $text = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $version = null,
        ?\DateTimeInterface $versionCreatedAt = null,
        ?int $voiceSampleSize = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $prompt && $self['prompt'] = $prompt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $text && $self['text'] = $text;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $version && $self['version'] = $version;
        null !== $versionCreatedAt && $self['versionCreatedAt'] = $versionCreatedAt;
        null !== $voiceSampleSize && $self['voiceSampleSize'] = $voiceSampleSize;

        return $self;
    }

    /**
     * Unique identifier for the voice design.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Timestamp when the voice design was first created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Name of the voice design.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Natural language prompt used to define the voice style for this version.
     */
    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }

    /**
     * Identifies the resource type.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Sample text used to synthesize this version.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Timestamp when the voice design was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Version number of this voice design.
     */
    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }

    /**
     * Timestamp when this specific version was created.
     */
    public function withVersionCreatedAt(
        \DateTimeInterface $versionCreatedAt
    ): self {
        $self = clone $this;
        $self['versionCreatedAt'] = $versionCreatedAt;

        return $self;
    }

    /**
     * Size of the voice sample audio in bytes.
     */
    public function withVoiceSampleSize(int $voiceSampleSize): self
    {
        $self = clone $this;
        $self['voiceSampleSize'] = $voiceSampleSize;

        return $self;
    }
}
