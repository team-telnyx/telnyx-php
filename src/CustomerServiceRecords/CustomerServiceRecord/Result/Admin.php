<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The admin of the customer service record.
 *
 * @phpstan-type AdminShape = array{
 *   account_number?: string|null,
 *   authorized_person_name?: string|null,
 *   billing_phone_number?: string|null,
 *   name?: string|null,
 * }
 */
final class Admin implements BaseModel
{
    /** @use SdkModel<AdminShape> */
    use SdkModel;

    /**
     * The account number of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $account_number;

    /**
     * The authorized person name of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $authorized_person_name;

    /**
     * The billing phone number of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $billing_phone_number;

    /**
     * The name of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $account_number = null,
        ?string $authorized_person_name = null,
        ?string $billing_phone_number = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        null !== $account_number && $obj['account_number'] = $account_number;
        null !== $authorized_person_name && $obj['authorized_person_name'] = $authorized_person_name;
        null !== $billing_phone_number && $obj['billing_phone_number'] = $billing_phone_number;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * The account number of the customer service record.
     */
    public function withAccountNumber(string $accountNumber): self
    {
        $obj = clone $this;
        $obj['account_number'] = $accountNumber;

        return $obj;
    }

    /**
     * The authorized person name of the customer service record.
     */
    public function withAuthorizedPersonName(string $authorizedPersonName): self
    {
        $obj = clone $this;
        $obj['authorized_person_name'] = $authorizedPersonName;

        return $obj;
    }

    /**
     * The billing phone number of the customer service record.
     */
    public function withBillingPhoneNumber(string $billingPhoneNumber): self
    {
        $obj = clone $this;
        $obj['billing_phone_number'] = $billingPhoneNumber;

        return $obj;
    }

    /**
     * The name of the customer service record.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
