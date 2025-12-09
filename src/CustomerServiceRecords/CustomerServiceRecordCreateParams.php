<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData;

/**
 * Create a new customer service record for the provided phone number.
 *
 * @see Telnyx\Services\CustomerServiceRecordsService::create()
 *
 * @phpstan-type CustomerServiceRecordCreateParamsShape = array{
 *   phoneNumber: string,
 *   additionalData?: AdditionalData|array{
 *     accountNumber?: string|null,
 *     addressLine1?: string|null,
 *     authorizedPersonName?: string|null,
 *     billingPhoneNumber?: string|null,
 *     city?: string|null,
 *     customerCode?: string|null,
 *     name?: string|null,
 *     pin?: string|null,
 *     state?: string|null,
 *     zipCode?: string|null,
 *   },
 *   webhookURL?: string,
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
    #[Required('phone_number')]
    public string $phoneNumber;

    #[Optional('additional_data')]
    public ?AdditionalData $additionalData;

    /**
     * Callback URL to receive webhook notifications.
     */
    #[Optional('webhook_url')]
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
     *
     * @param AdditionalData|array{
     *   accountNumber?: string|null,
     *   addressLine1?: string|null,
     *   authorizedPersonName?: string|null,
     *   billingPhoneNumber?: string|null,
     *   city?: string|null,
     *   customerCode?: string|null,
     *   name?: string|null,
     *   pin?: string|null,
     *   state?: string|null,
     *   zipCode?: string|null,
     * } $additionalData
     */
    public static function with(
        string $phoneNumber,
        AdditionalData|array|null $additionalData = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj['phoneNumber'] = $phoneNumber;

        null !== $additionalData && $obj['additionalData'] = $additionalData;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * A valid US phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * @param AdditionalData|array{
     *   accountNumber?: string|null,
     *   addressLine1?: string|null,
     *   authorizedPersonName?: string|null,
     *   billingPhoneNumber?: string|null,
     *   city?: string|null,
     *   customerCode?: string|null,
     *   name?: string|null,
     *   pin?: string|null,
     *   state?: string|null,
     *   zipCode?: string|null,
     * } $additionalData
     */
    public function withAdditionalData(
        AdditionalData|array $additionalData
    ): self {
        $obj = clone $this;
        $obj['additionalData'] = $additionalData;

        return $obj;
    }

    /**
     * Callback URL to receive webhook notifications.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
