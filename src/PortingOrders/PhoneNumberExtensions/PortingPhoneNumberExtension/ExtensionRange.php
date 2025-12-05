<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Specifies the extension range for this porting phone number extension.
 *
 * @phpstan-type ExtensionRangeShape = array{
 *   end_at?: int|null, start_at?: int|null
 * }
 */
final class ExtensionRange implements BaseModel
{
    /** @use SdkModel<ExtensionRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    #[Api(optional: true)]
    public ?int $end_at;

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    #[Api(optional: true)]
    public ?int $start_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $end_at = null, ?int $start_at = null): self
    {
        $obj = new self;

        null !== $end_at && $obj['end_at'] = $end_at;
        null !== $start_at && $obj['start_at'] = $start_at;

        return $obj;
    }

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    public function withEndAt(int $endAt): self
    {
        $obj = clone $this;
        $obj['end_at'] = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    public function withStartAt(int $startAt): self
    {
        $obj = clone $this;
        $obj['start_at'] = $startAt;

        return $obj;
    }
}
