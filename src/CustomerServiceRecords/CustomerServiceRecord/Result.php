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
 * @phpstan-type result_alias = array{
 *   address?: Address,
 *   admin?: Admin,
 *   associatedPhoneNumbers?: list<string>,
 *   carrierName?: string,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<result_alias> */
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
     * @var list<string>|null $associatedPhoneNumbers
     */
    #[Api('associated_phone_numbers', list: 'string', optional: true)]
    public ?array $associatedPhoneNumbers;

    /**
     * The name of the carrier that the customer service record is for.
     */
    #[Api('carrier_name', optional: true)]
    public ?string $carrierName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $associatedPhoneNumbers
     */
    public static function with(
        ?Address $address = null,
        ?Admin $admin = null,
        ?array $associatedPhoneNumbers = null,
        ?string $carrierName = null,
    ): self {
        $obj = new self;

        null !== $address && $obj->address = $address;
        null !== $admin && $obj->admin = $admin;
        null !== $associatedPhoneNumbers && $obj->associatedPhoneNumbers = $associatedPhoneNumbers;
        null !== $carrierName && $obj->carrierName = $carrierName;

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
        $obj->associatedPhoneNumbers = $associatedPhoneNumbers;

        return $obj;
    }

    /**
     * The name of the carrier that the customer service record is for.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrierName = $carrierName;

        return $obj;
    }
}
