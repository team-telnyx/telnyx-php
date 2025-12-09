<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionCancelResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{phoneNumbersURL?: string|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Link to list all phone numbers.
     */
    #[Optional('phone_numbers_url')]
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
        $self = new self;

        null !== $phoneNumbersURL && $self['phoneNumbersURL'] = $phoneNumbersURL;

        return $self;
    }

    /**
     * Link to list all phone numbers.
     */
    public function withPhoneNumbersURL(string $phoneNumbersURL): self
    {
        $self = clone $this;
        $self['phoneNumbersURL'] = $phoneNumbersURL;

        return $self;
    }
}
