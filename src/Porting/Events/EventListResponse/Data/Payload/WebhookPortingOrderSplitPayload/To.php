<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderSplitPayload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The new porting order that the phone numbers was moved to.
 *
 * @phpstan-type to_alias = array{id?: string}
 */
final class To implements BaseModel
{
    /** @use SdkModel<to_alias> */
    use SdkModel;

    /**
     * Identifies the porting order that was split.
     */
    #[Api(optional: true)]
    public ?string $id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null): self
    {
        $obj = new self;

        null !== $id && $obj->id = $id;

        return $obj;
    }

    /**
     * Identifies the porting order that was split.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
