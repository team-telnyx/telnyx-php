<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts\MessagingOptoutListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   from?: string|null,
 *   keyword?: string|null,
 *   messagingProfileID?: string|null,
 *   to?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $from && $obj['from'] = $from;
        null !== $keyword && $obj['keyword'] = $keyword;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $to && $obj['to'] = $to;

        return $obj;
    }

    /**
     * The timestamp when the opt-out was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The keyword that triggered the opt-out.
     */
    public function withKeyword(?string $keyword): self
    {
        $obj = clone $this;
        $obj['keyword'] = $keyword;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }
}
