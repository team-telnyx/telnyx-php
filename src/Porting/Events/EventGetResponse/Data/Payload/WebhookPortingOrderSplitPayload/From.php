<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The porting order that was split.
 *
 * @phpstan-type from_alias = array{id?: string}
 */
final class From implements BaseModel
{
    /** @use SdkModel<from_alias> */
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
