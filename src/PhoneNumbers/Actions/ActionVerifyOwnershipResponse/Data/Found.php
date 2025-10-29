<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FoundShape = array{id?: string, numberValE164?: string}
 */
final class Found implements BaseModel
{
    /** @use SdkModel<FoundShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The phone number in E.164 format.
     */
    #[Api('number_val_e164', optional: true)]
    public ?string $numberValE164;

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
        ?string $numberValE164 = null
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $numberValE164 && $obj->numberValE164 = $numberValE164;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The phone number in E.164 format.
     */
    public function withNumberValE164(string $numberValE164): self
    {
        $obj = clone $this;
        $obj->numberValE164 = $numberValE164;

        return $obj;
    }
}
