<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceDesigns\VoiceDesignListResponse\Provider;
use Telnyx\VoiceDesigns\VoiceDesignListResponse\RecordType;

/**
 * A summarized voice design object (without version-specific fields).
 *
 * @phpstan-type VoiceDesignListResponseShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   provider?: null|Provider|value-of<Provider>,
 *   providerSupportedModels?: list<string>|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class VoiceDesignListResponse implements BaseModel
{
    /** @use SdkModel<VoiceDesignListResponseShape> */
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
     * Voice synthesis provider used for this design.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class, nullable: true)]
    public ?string $provider;

    /**
     * List of TTS model identifiers supported by this design's provider.
     *
     * @var list<string>|null $providerSupportedModels
     */
    #[Optional('provider_supported_models', list: 'string')]
    public ?array $providerSupportedModels;

    /**
     * Identifies the resource type.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Timestamp when the voice design was last updated.
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
     * @param Provider|value-of<Provider>|null $provider
     * @param list<string>|null $providerSupportedModels
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        Provider|string|null $provider = null,
        ?array $providerSupportedModels = null,
        RecordType|string|null $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $provider && $self['provider'] = $provider;
        null !== $providerSupportedModels && $self['providerSupportedModels'] = $providerSupportedModels;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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
     * List of TTS model identifiers supported by this design's provider.
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
     * Timestamp when the voice design was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
