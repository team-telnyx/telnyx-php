<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumberUpdateParams); // set properties as needed
 * $client->phoneNumbers->update(...$params->toArray());
 * ```
 * Update a phone number.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers->update(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers->update
 *
 * @phpstan-type phone_number_update_params = array{
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   externalPin?: string,
 *   hdVoiceEnabled?: bool,
 *   tags?: list<string>,
 * }
 */
final class PhoneNumberUpdateParams implements BaseModel
{
    /** @use SdkModel<phone_number_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Api('external_pin', optional: true)]
    public ?string $externalPin;

    /**
     * Indicates whether HD voice is enabled for this number.
     */
    #[Api('hd_voice_enabled', optional: true)]
    public ?bool $hdVoiceEnabled;

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
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $externalPin = null,
        ?bool $hdVoiceEnabled = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $externalPin && $obj->externalPin = $externalPin;
        null !== $hdVoiceEnabled && $obj->hdVoiceEnabled = $hdVoiceEnabled;
        null !== $tags && $obj->tags = $tags;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj->externalPin = $externalPin;

        return $obj;
    }

    /**
     * Indicates whether HD voice is enabled for this number.
     */
    public function withHDVoiceEnabled(bool $hdVoiceEnabled): self
    {
        $obj = clone $this;
        $obj->hdVoiceEnabled = $hdVoiceEnabled;

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
