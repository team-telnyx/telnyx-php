<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionCancelResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{phoneNumbersURL?: string}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
    use SdkModel;

    /**
     * Link to list all phone numbers.
     */
    #[Api('phone_numbers_url', optional: true)]
    public ?string $phoneNumbersURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $phoneNumbersURL = null): self
    {
        $obj = new self;

        null !== $phoneNumbersURL && $obj->phoneNumbersURL = $phoneNumbersURL;

        return $obj;
    }

    /**
     * Link to list all phone numbers.
     */
    public function withPhoneNumbersURL(string $phoneNumbersURL): self
    {
        $obj = clone $this;
        $obj->phoneNumbersURL = $phoneNumbersURL;

        return $obj;
    }
}
