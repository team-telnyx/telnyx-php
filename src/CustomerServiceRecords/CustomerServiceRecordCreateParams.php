<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CustomerServiceRecordCreateParams); // set properties as needed
 * $client->customerServiceRecords->create(...$params->toArray());
 * ```
 * Create a new customer service record for the provided phone number.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->customerServiceRecords->create(...$params->toArray());`
 *
 * @see Telnyx\CustomerServiceRecords->create
 *
 * @phpstan-type customer_service_record_create_params = array{
 *   phoneNumber: string, additionalData?: AdditionalData, webhookURL?: string
 * }
 */
final class CustomerServiceRecordCreateParams implements BaseModel
{
    /** @use SdkModel<customer_service_record_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A valid US phone number in E164 format.
     */
    #[Api('phone_number')]
    public string $phoneNumber;

    #[Api('additional_data', optional: true)]
    public ?AdditionalData $additionalData;

    /**
     * Callback URL to receive webhook notifications.
     */
    #[Api('webhook_url', optional: true)]
    public ?string $webhookURL;

    /**
     * `new CustomerServiceRecordCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerServiceRecordCreateParams::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerServiceRecordCreateParams)->withPhoneNumber(...)
     * ```
     */
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
        string $phoneNumber,
        ?AdditionalData $additionalData = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;

        null !== $additionalData && $obj->additionalData = $additionalData;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * A valid US phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withAdditionalData(AdditionalData $additionalData): self
    {
        $obj = clone $this;
        $obj->additionalData = $additionalData;

        return $obj;
    }

    /**
     * Callback URL to receive webhook notifications.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
