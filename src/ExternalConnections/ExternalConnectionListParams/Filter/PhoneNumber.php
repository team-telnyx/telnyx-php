<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
 *
 * @phpstan-type PhoneNumberShape = array{contains?: string}
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * If present, connections associated with the given phone_number will be returned. A full match is necessary with a e164 format.
     */
    #[Api(optional: true)]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;

        return $obj;
    }

    /**
     * If present, connections associated with the given phone_number will be returned. A full match is necessary with a e164 format.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }
}
