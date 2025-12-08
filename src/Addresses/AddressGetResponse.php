<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressGetResponseShape = array{data?: Address|null}
 */
final class AddressGetResponse implements BaseModel
{
    /** @use SdkModel<AddressGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Address $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Address|array{
     *   id?: string|null,
     *   address_book?: bool|null,
     *   administrative_area?: string|null,
     *   borough?: string|null,
     *   business_name?: string|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   extended_address?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phone_number?: string|null,
     *   postal_code?: string|null,
     *   record_type?: string|null,
     *   street_address?: string|null,
     *   updated_at?: string|null,
     *   validate_address?: bool|null,
     * } $data
     */
    public static function with(Address|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Address|array{
     *   id?: string|null,
     *   address_book?: bool|null,
     *   administrative_area?: string|null,
     *   borough?: string|null,
     *   business_name?: string|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   extended_address?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phone_number?: string|null,
     *   postal_code?: string|null,
     *   record_type?: string|null,
     *   street_address?: string|null,
     *   updated_at?: string|null,
     *   validate_address?: bool|null,
     * } $data
     */
    public function withData(Address|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
