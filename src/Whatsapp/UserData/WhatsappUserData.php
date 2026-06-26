<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\UserData;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WhatsappUserDataShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class WhatsappUserData implements BaseModel
{
    /** @use SdkModel<WhatsappUserDataShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Failover URL to receive Whatsapp signup events.
     */
    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    /**
     * URL to receive Whatsapp signup events.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?\DateTimeInterface $createdAt = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withRecordType(string $recordType): self
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

    /**
     * Failover URL to receive Whatsapp signup events.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * URL to receive Whatsapp signup events.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
