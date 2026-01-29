<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingOptoutListResponseShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   from?: string|null,
 *   keyword?: string|null,
 *   messagingProfileID?: string|null,
 *   to?: string|null,
 * }
 */
final class MessagingOptoutListResponse implements BaseModel
{
    /** @use SdkModel<MessagingOptoutListResponseShape> */
    use SdkModel;

    /**
     * The timestamp when the opt-out was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    #[Optional]
    public ?string $from;

    /**
     * The keyword that triggered the opt-out.
     */
    #[Optional(nullable: true)]
    public ?string $keyword;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Optional('messaging_profile_id', nullable: true)]
    public ?string $messagingProfileID;

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    #[Optional]
    public ?string $to;

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
        ?string $from = null,
        ?string $keyword = null,
        ?string $messagingProfileID = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $from && $self['from'] = $from;
        null !== $keyword && $self['keyword'] = $keyword;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * The timestamp when the opt-out was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The keyword that triggered the opt-out.
     */
    public function withKeyword(?string $keyword): self
    {
        $self = clone $this;
        $self['keyword'] = $keyword;

        return $self;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
