<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type UserAddressNewResponseShape = array{data?: UserAddress|null}
 */
final class UserAddressNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UserAddressNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?UserAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserAddress|array{
     *   id?: string|null,
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
     * } $data
     */
    public static function with(UserAddress|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param UserAddress|array{
     *   id?: string|null,
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
     * } $data
     */
    public function withData(UserAddress|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
