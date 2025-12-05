<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionConfirmResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{phone_numbers_url?: string|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Link to list all phone numbers.
     */
    #[Api(optional: true)]
    public ?string $phone_numbers_url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $phone_numbers_url = null): self
    {
        $obj = new self;

        null !== $phone_numbers_url && $obj['phone_numbers_url'] = $phone_numbers_url;

        return $obj;
    }

    /**
     * Link to list all phone numbers.
     */
    public function withPhoneNumbersURL(string $phoneNumbersURL): self
    {
        $obj = clone $this;
        $obj['phone_numbers_url'] = $phoneNumbersURL;

        return $obj;
    }
}
