<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\PhoneNumberGetConversationWindowResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   lastUserMessageAt?: \DateTimeInterface|null,
 *   windowActive?: bool|null,
 *   windowExpiresAt?: \DateTimeInterface|null,
 *   windowType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Timestamp of the last inbound message that opened the window.
     */
    #[Optional('last_user_message_at')]
    public ?\DateTimeInterface $lastUserMessageAt;

    /**
     * Whether the 24-hour conversation window is currently open.
     */
    #[Optional('window_active')]
    public ?bool $windowActive;

    /**
     * When the window closes. Null if no active window.
     */
    #[Optional('window_expires_at')]
    public ?\DateTimeInterface $windowExpiresAt;

    /**
     * Window type. Currently always 24h when present.
     */
    #[Optional('window_type')]
    public ?string $windowType;

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
        ?\DateTimeInterface $lastUserMessageAt = null,
        ?bool $windowActive = null,
        ?\DateTimeInterface $windowExpiresAt = null,
        ?string $windowType = null,
    ): self {
        $self = new self;

        null !== $lastUserMessageAt && $self['lastUserMessageAt'] = $lastUserMessageAt;
        null !== $windowActive && $self['windowActive'] = $windowActive;
        null !== $windowExpiresAt && $self['windowExpiresAt'] = $windowExpiresAt;
        null !== $windowType && $self['windowType'] = $windowType;

        return $self;
    }

    /**
     * Timestamp of the last inbound message that opened the window.
     */
    public function withLastUserMessageAt(
        \DateTimeInterface $lastUserMessageAt
    ): self {
        $self = clone $this;
        $self['lastUserMessageAt'] = $lastUserMessageAt;

        return $self;
    }

    /**
     * Whether the 24-hour conversation window is currently open.
     */
    public function withWindowActive(bool $windowActive): self
    {
        $self = clone $this;
        $self['windowActive'] = $windowActive;

        return $self;
    }

    /**
     * When the window closes. Null if no active window.
     */
    public function withWindowExpiresAt(
        \DateTimeInterface $windowExpiresAt
    ): self {
        $self = clone $this;
        $self['windowExpiresAt'] = $windowExpiresAt;

        return $self;
    }

    /**
     * Window type. Currently always 24h when present.
     */
    public function withWindowType(string $windowType): self
    {
        $self = clone $this;
        $self['windowType'] = $windowType;

        return $self;
    }
}
