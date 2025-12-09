<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The webhook payload for the portout.foc_date_changed event.
 *
 * @phpstan-type WebhookPortoutFocDateChangedPayloadShape = array{
 *   id?: string|null, focDate?: \DateTimeInterface|null, userID?: string|null
 * }
 */
final class WebhookPortoutFocDateChangedPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortoutFocDateChangedPayloadShape> */
    use SdkModel;

    /**
     * Identifies the port-out order that have the FOC date changed.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating the new FOC date.
     */
    #[Optional('foc_date')]
    public ?\DateTimeInterface $focDate;

    /**
     * Identifies the organization that port-out order belongs to.
     */
    #[Optional('user_id')]
    public ?string $userID;

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
        ?string $id = null,
        ?\DateTimeInterface $focDate = null,
        ?string $userID = null
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $focDate && $obj['focDate'] = $focDate;
        null !== $userID && $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Identifies the port-out order that have the FOC date changed.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating the new FOC date.
     */
    public function withFocDate(\DateTimeInterface $focDate): self
    {
        $obj = clone $this;
        $obj['focDate'] = $focDate;

        return $obj;
    }

    /**
     * Identifies the organization that port-out order belongs to.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
