<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Address;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Admin;

/**
 * The result of the CSR request. This field would be null in case of `pending` or `failed` status.
 *
 * @phpstan-type ResultShape = array{
 *   address?: Address|null,
 *   admin?: Admin|null,
 *   associated_phone_numbers?: list<string>|null,
 *   carrier_name?: string|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    /**
     * The address of the customer service record.
     */
    #[Api(optional: true)]
    public ?Address $address;

    /**
     * The admin of the customer service record.
     */
    #[Api(optional: true)]
    public ?Admin $admin;

    /**
     * The associated phone numbers of the customer service record.
     *
     * @var list<string>|null $associated_phone_numbers
     */
    #[Api(list: 'string', optional: true)]
    public ?array $associated_phone_numbers;

    /**
     * The name of the carrier that the customer service record is for.
     */
    #[Api(optional: true)]
    public ?string $carrier_name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $associated_phone_numbers
     */
    public static function with(
        ?Address $address = null,
        ?Admin $admin = null,
        ?array $associated_phone_numbers = null,
        ?string $carrier_name = null,
    ): self {
        $obj = new self;

        null !== $address && $obj->address = $address;
        null !== $admin && $obj->admin = $admin;
        null !== $associated_phone_numbers && $obj->associated_phone_numbers = $associated_phone_numbers;
        null !== $carrier_name && $obj->carrier_name = $carrier_name;

        return $obj;
    }

    /**
     * The address of the customer service record.
     */
    public function withAddress(Address $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * The admin of the customer service record.
     */
    public function withAdmin(Admin $admin): self
    {
        $obj = clone $this;
        $obj->admin = $admin;

        return $obj;
    }

    /**
     * The associated phone numbers of the customer service record.
     *
     * @param list<string> $associatedPhoneNumbers
     */
    public function withAssociatedPhoneNumbers(
        array $associatedPhoneNumbers
    ): self {
        $obj = clone $this;
        $obj->associated_phone_numbers = $associatedPhoneNumbers;

        return $obj;
    }

    /**
     * The name of the carrier that the customer service record is for.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrier_name = $carrierName;

        return $obj;
    }
}
