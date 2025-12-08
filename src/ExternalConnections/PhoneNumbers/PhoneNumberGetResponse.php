<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber\AcquiredCapability;

/**
 * @phpstan-type PhoneNumberGetResponseShape = array{
 *   data?: ExternalConnectionPhoneNumber|null
 * }
 */
final class PhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberGetResponseShape> */
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
     *   acquired_capabilities?: list<value-of<AcquiredCapability>>|null,
     *   civic_address_id?: string|null,
     *   displayed_country_code?: string|null,
     *   location_id?: string|null,
     *   number_id?: string|null,
     *   telephone_number?: string|null,
     *   ticket_id?: string|null,
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
     *   acquired_capabilities?: list<value-of<AcquiredCapability>>|null,
     *   civic_address_id?: string|null,
     *   displayed_country_code?: string|null,
     *   location_id?: string|null,
     *   number_id?: string|null,
     *   telephone_number?: string|null,
     *   ticket_id?: string|null,
     * } $data
     */
    public function withData(ExternalConnectionPhoneNumber|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
