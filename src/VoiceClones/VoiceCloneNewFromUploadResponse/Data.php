<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse\Data\Gender;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse\Data\Provider;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse\Data\RecordType;

/**
 * A voice clone object.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   gender?: null|Gender|value-of<Gender>,
 *   label?: string|null,
 *   language?: string|null,
 *   name?: string|null,
 *   provider?: null|Provider|value-of<Provider>,
 *   providerSupportedModels?: list<string>|null,
 *   providerVoiceID?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   sourceVoiceDesignID?: string|null,
 *   sourceVoiceDesignVersion?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the voice clone.
     */
    #[Optional]
    public ?string $id;

    /**
     * Timestamp when the voice clone was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Gender of the voice clone.
     *
     * @var value-of<Gender>|null $gender
     */
    #[Optional(enum: Gender::class, nullable: true)]
    public ?string $gender;

    /**
     * Voice style description. If not explicitly set on upload, falls back to the source design's prompt text.
     */
    #[Optional(nullable: true)]
    public ?string $label;

    /**
     * ISO 639-1 language code of the voice clone.
     */
    #[Optional(nullable: true)]
    public ?string $language;

    /**
     * Name of the voice clone.
     */
    #[Optional]
    public ?string $name;

    /**
     * Voice synthesis provider used for this clone.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * List of TTS model identifiers supported by this clone's provider.
     *
     * @var list<string>|null $providerSupportedModels
     */
    #[Optional('provider_supported_models', list: 'string')]
    public ?array $providerSupportedModels;

    /**
     * Provider-specific voice identifier used for TTS synthesis. For Telnyx clones this equals the clone ID; for Minimax it is the Minimax-assigned voice ID.
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
     * UUID of the source voice design. `null` for upload-based clones.
     */
    #[Optional('source_voice_design_id', nullable: true)]
    public ?string $sourceVoiceDesignID;

    /**
     * Version of the source voice design used. `null` for upload-based clones.
     */
    #[Optional('source_voice_design_version', nullable: true)]
    public ?int $sourceVoiceDesignVersion;

    /**
     * Timestamp when the voice clone was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Gender|value-of<Gender>|null $gender
     * @param Provider|value-of<Provider>|null $provider
     * @param list<string>|null $providerSupportedModels
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        Gender|string|null $gender = null,
        ?string $label = null,
        ?string $language = null,
        ?string $name = null,
        Provider|string|null $provider = null,
        ?array $providerSupportedModels = null,
        ?string $providerVoiceID = null,
        RecordType|string|null $recordType = null,
        ?string $sourceVoiceDesignID = null,
        ?int $sourceVoiceDesignVersion = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $gender && $self['gender'] = $gender;
        null !== $label && $self['label'] = $label;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $provider && $self['provider'] = $provider;
        null !== $providerSupportedModels && $self['providerSupportedModels'] = $providerSupportedModels;
        null !== $providerVoiceID && $self['providerVoiceID'] = $providerVoiceID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sourceVoiceDesignID && $self['sourceVoiceDesignID'] = $sourceVoiceDesignID;
        null !== $sourceVoiceDesignVersion && $self['sourceVoiceDesignVersion'] = $sourceVoiceDesignVersion;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Unique identifier for the voice clone.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Timestamp when the voice clone was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Gender of the voice clone.
     *
     * @param Gender|value-of<Gender>|null $gender
     */
    public function withGender(Gender|string|null $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Voice style description. If not explicitly set on upload, falls back to the source design's prompt text.
     */
    public function withLabel(?string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * ISO 639-1 language code of the voice clone.
     */
    public function withLanguage(?string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Name of the voice clone.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Voice synthesis provider used for this clone.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * List of TTS model identifiers supported by this clone's provider.
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
     * Provider-specific voice identifier used for TTS synthesis. For Telnyx clones this equals the clone ID; for Minimax it is the Minimax-assigned voice ID.
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
     * UUID of the source voice design. `null` for upload-based clones.
     */
    public function withSourceVoiceDesignID(?string $sourceVoiceDesignID): self
    {
        $self = clone $this;
        $self['sourceVoiceDesignID'] = $sourceVoiceDesignID;

        return $self;
    }

    /**
     * Version of the source voice design used. `null` for upload-based clones.
     */
    public function withSourceVoiceDesignVersion(
        ?int $sourceVoiceDesignVersion
    ): self {
        $self = clone $this;
        $self['sourceVoiceDesignVersion'] = $sourceVoiceDesignVersion;

        return $self;
    }

    /**
     * Timestamp when the voice clone was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
