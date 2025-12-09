<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber\AcquiredCapability;

/**
 * @phpstan-type PhoneNumberUpdateResponseShape = array{
 *   data?: ExternalConnectionPhoneNumber|null
 * }
 */
final class PhoneNumberUpdateResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ExternalConnectionPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalConnectionPhoneNumber|array{
     *   acquiredCapabilities?: list<value-of<AcquiredCapability>>|null,
     *   civicAddressID?: string|null,
     *   displayedCountryCode?: string|null,
     *   locationID?: string|null,
     *   numberID?: string|null,
     *   telephoneNumber?: string|null,
     *   ticketID?: string|null,
     * } $data
     */
    public static function with(
        ExternalConnectionPhoneNumber|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ExternalConnectionPhoneNumber|array{
     *   acquiredCapabilities?: list<value-of<AcquiredCapability>>|null,
     *   civicAddressID?: string|null,
     *   displayedCountryCode?: string|null,
     *   locationID?: string|null,
     *   numberID?: string|null,
     *   telephoneNumber?: string|null,
     *   ticketID?: string|null,
     * } $data
     */
    public function withData(ExternalConnectionPhoneNumber|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
