<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts\MessagingOptoutListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   created_at?: \DateTimeInterface|null,
 *   from?: string|null,
 *   keyword?: string|null,
 *   messaging_profile_id?: string|null,
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The keyword that triggered the opt-out.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $keyword;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $messaging_profile_id;

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    #[Api(optional: true)]
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
        ?\DateTimeInterface $created_at = null,
        ?string $from = null,
        ?string $keyword = null,
        ?string $messaging_profile_id = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $from && $obj['from'] = $from;
        null !== $keyword && $obj['keyword'] = $keyword;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $to && $obj['to'] = $to;

        return $obj;
    }

    /**
     * The timestamp when the opt-out was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

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
        $obj['messaging_profile_id'] = $messagingProfileID;

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
