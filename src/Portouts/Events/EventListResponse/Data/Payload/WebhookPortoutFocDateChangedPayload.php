<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The webhook payload for the portout.foc_date_changed event.
 *
 * @phpstan-type WebhookPortoutFocDateChangedPayloadShape = array{
 *   id?: string|null, foc_date?: \DateTimeInterface|null, user_id?: string|null
 * }
 */
final class WebhookPortoutFocDateChangedPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortoutFocDateChangedPayloadShape> */
    use SdkModel;

    /**
     * Identifies the port-out order that have the FOC date changed.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating the new FOC date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $foc_date;

    /**
     * Identifies the organization that port-out order belongs to.
     */
    #[Api(optional: true)]
    public ?string $user_id;

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
        ?\DateTimeInterface $foc_date = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $foc_date && $obj['foc_date'] = $foc_date;
        null !== $user_id && $obj['user_id'] = $user_id;

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
        $obj['foc_date'] = $focDate;

        return $obj;
    }

    /**
     * Identifies the organization that port-out order belongs to.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
