<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a phone number.
 *
 * @see Telnyx\PhoneNumbersService::update()
 *
 * @phpstan-type PhoneNumberUpdateParamsShape = array{
 *   billing_group_id?: string,
 *   connection_id?: string,
 *   customer_reference?: string,
 *   external_pin?: string,
 *   hd_voice_enabled?: bool,
 *   tags?: list<string>,
 * }
 */
final class PhoneNumberUpdateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $billing_group_id;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Api(optional: true)]
    public ?string $external_pin;

    /**
     * Indicates whether HD voice is enabled for this number.
     */
    #[Api(optional: true)]
    public ?bool $hd_voice_enabled;

    /**
     * A list of user-assigned tags to help organize phone numbers.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $tags
     */
    public static function with(
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        ?string $external_pin = null,
        ?bool $hd_voice_enabled = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $external_pin && $obj->external_pin = $external_pin;
        null !== $hd_voice_enabled && $obj->hd_voice_enabled = $hd_voice_enabled;
        null !== $tags && $obj->tags = $tags;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billing_group_id = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj->external_pin = $externalPin;

        return $obj;
    }

    /**
     * Indicates whether HD voice is enabled for this number.
     */
    public function withHDVoiceEnabled(bool $hdVoiceEnabled): self
    {
        $obj = clone $this;
        $obj->hd_voice_enabled = $hdVoiceEnabled;

        return $obj;
    }

    /**
     * A list of user-assigned tags to help organize phone numbers.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }
}
