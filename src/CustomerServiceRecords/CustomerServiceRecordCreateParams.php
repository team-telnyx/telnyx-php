<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData;

/**
 * Create a new customer service record for the provided phone number.
 *
 * @see Telnyx\CustomerServiceRecordsService::create()
 *
 * @phpstan-type CustomerServiceRecordCreateParamsShape = array{
 *   phone_number: string, additional_data?: AdditionalData, webhook_url?: string
 * }
 */
final class CustomerServiceRecordCreateParams implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A valid US phone number in E164 format.
     */
    #[Api]
    public string $phone_number;

    #[Api(optional: true)]
    public ?AdditionalData $additional_data;

    /**
     * Callback URL to receive webhook notifications.
     */
    #[Api(optional: true)]
    public ?string $webhook_url;

    /**
     * `new CustomerServiceRecordCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerServiceRecordCreateParams::with(phone_number: ...)
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
        string $phone_number,
        ?AdditionalData $additional_data = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        $obj->phone_number = $phone_number;

        null !== $additional_data && $obj->additional_data = $additional_data;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

        return $obj;
    }

    /**
     * A valid US phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    public function withAdditionalData(AdditionalData $additionalData): self
    {
        $obj = clone $this;
        $obj->additional_data = $additionalData;

        return $obj;
    }

    /**
     * Callback URL to receive webhook notifications.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

        return $obj;
    }
}
