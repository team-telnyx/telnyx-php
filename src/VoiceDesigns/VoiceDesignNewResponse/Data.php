<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns\VoiceDesignNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceDesigns\VoiceDesignNewResponse\Data\Provider;
use Telnyx\VoiceDesigns\VoiceDesignNewResponse\Data\RecordType;

/**
 * A voice design object with full version detail.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   prompt?: string|null,
 *   provider?: null|Provider|value-of<Provider>,
 *   providerSupportedModels?: list<string>|null,
 *   providerVoiceID?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   text?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   version?: int|null,
 *   versionCreatedAt?: \DateTimeInterface|null,
 *   voiceSampleSize?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
     * Voice synthesis provider used for this design.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class, nullable: true)]
    public ?string $provider;

    /**
     * List of TTS model identifiers supported by this design's provider (e.g. `Qwen3TTS`, `speech-02-turbo`).
     *
     * @var list<string>|null $providerSupportedModels
     */
    #[Optional('provider_supported_models', list: 'string')]
    public ?array $providerSupportedModels;

    /**
     * Provider-specific voice identifier. For Telnyx designs this is the design version ID; for Minimax it is the Minimax-assigned voice ID.
     */
    #[Optional('provider_voice_id', nullable: true)]
    public ?string $providerVoiceID;

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
     * @param Provider|value-of<Provider>|null $provider
     * @param list<string>|null $providerSupportedModels
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $prompt = null,
        Provider|string|null $provider = null,
        ?array $providerSupportedModels = null,
        ?string $providerVoiceID = null,
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
        null !== $provider && $self['provider'] = $provider;
        null !== $providerSupportedModels && $self['providerSupportedModels'] = $providerSupportedModels;
        null !== $providerVoiceID && $self['providerVoiceID'] = $providerVoiceID;
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
     * Voice synthesis provider used for this design.
     *
     * @param Provider|value-of<Provider>|null $provider
     */
    public function withProvider(Provider|string|null $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * List of TTS model identifiers supported by this design's provider (e.g. `Qwen3TTS`, `speech-02-turbo`).
     *
     * @param list<string> $providerSupportedModels
     */
    public function withProviderSupportedModels(
        array $providerSupportedModels
    ): self {
        $self = clone $this;
        $self['providerSupportedModels'] = $providerSupportedModels;

        return $self;
    }

    /**
     * Provider-specific voice identifier. For Telnyx designs this is the design version ID; for Minimax it is the Minimax-assigned voice ID.
     */
    public function withProviderVoiceID(?string $providerVoiceID): self
    {
        $self = clone $this;
        $self['providerVoiceID'] = $providerVoiceID;

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
