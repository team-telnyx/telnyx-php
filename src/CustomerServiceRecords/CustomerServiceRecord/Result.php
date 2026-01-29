<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Address;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Admin;

/**
 * The result of the CSR request. This field would be null in case of `pending` or `failed` status.
 *
 * @phpstan-import-type AddressShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Address
 * @phpstan-import-type AdminShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Admin
 *
 * @phpstan-type ResultShape = array{
 *   address?: null|Address|AddressShape,
 *   admin?: null|Admin|AdminShape,
 *   associatedPhoneNumbers?: list<string>|null,
 *   carrierName?: string|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    /**
     * The address of the customer service record.
     */
    #[Optional]
    public ?Address $address;

    /**
     * The admin of the customer service record.
     */
    #[Optional]
    public ?Admin $admin;

    /**
     * The associated phone numbers of the customer service record.
     *
     * @var list<string>|null $associatedPhoneNumbers
     */
    #[Optional('associated_phone_numbers', list: 'string')]
    public ?array $associatedPhoneNumbers;

    /**
     * The name of the carrier that the customer service record is for.
     */
    #[Optional('carrier_name')]
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
     * @param Address|AddressShape|null $address
     * @param Admin|AdminShape|null $admin
     * @param list<string>|null $associatedPhoneNumbers
     */
    public static function with(
        Address|array|null $address = null,
        Admin|array|null $admin = null,
        ?array $associatedPhoneNumbers = null,
        ?string $carrierName = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $admin && $self['admin'] = $admin;
        null !== $associatedPhoneNumbers && $self['associatedPhoneNumbers'] = $associatedPhoneNumbers;
        null !== $carrierName && $self['carrierName'] = $carrierName;

        return $self;
    }

    /**
     * The address of the customer service record.
     *
     * @param Address|AddressShape $address
     */
    public function withAddress(Address|array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * The admin of the customer service record.
     *
     * @param Admin|AdminShape $admin
     */
    public function withAdmin(Admin|array $admin): self
    {
        $self = clone $this;
        $self['admin'] = $admin;

        return $self;
    }

    /**
     * The associated phone numbers of the customer service record.
     *
     * @param list<string> $associatedPhoneNumbers
     */
    public function withAssociatedPhoneNumbers(
        array $associatedPhoneNumbers
    ): self {
        $self = clone $this;
        $self['associatedPhoneNumbers'] = $associatedPhoneNumbers;

        return $self;
    }

    /**
     * The name of the carrier that the customer service record is for.
     */
    public function withCarrierName(string $carrierName): self
    {
        $self = clone $this;
        $self['carrierName'] = $carrierName;

        return $self;
    }
}
