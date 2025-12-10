<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\SMSOtp;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Status information for an SMS OTP sent during Sole Proprietor brand verification.
 *
 * @phpstan-type SMSOtpGetStatusResponseShape = array{
 *   brandID: string,
 *   deliveryStatus: string,
 *   mobilePhone: string,
 *   referenceID: string,
 *   requestDate: \DateTimeInterface,
 *   deliveryStatusDate?: \DateTimeInterface|null,
 *   deliveryStatusDetails?: string|null,
 *   verifyDate?: \DateTimeInterface|null,
 * }
 */
final class SMSOtpGetStatusResponse implements BaseModel
{
    /** @use SdkModel<SMSOtpGetStatusResponseShape> */
    use SdkModel;

    /**
     * The Brand ID associated with this OTP request.
     */
    #[Required('brandId')]
    public string $brandID;

    /**
     * The current delivery status of the OTP SMS message. Common values include: `DELIVERED_HANDSET`, `PENDING`, `FAILED`, `EXPIRED`.
     */
    #[Required]
    public string $deliveryStatus;

    /**
     * The mobile phone number where the OTP was sent, in E.164 format.
     */
    #[Required]
    public string $mobilePhone;

    /**
     * The reference ID for this OTP request, used for status queries.
     */
    #[Required('referenceId')]
    public string $referenceID;

    /**
     * The timestamp when the OTP request was initiated.
     */
    #[Required]
    public \DateTimeInterface $requestDate;

    /**
     * The timestamp when the delivery status was last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $deliveryStatusDate;

    /**
     * Additional details about the delivery status.
     */
    #[Optional]
    public ?string $deliveryStatusDetails;

    /**
     * The timestamp when the OTP was successfully verified (if applicable).
     */
    #[Optional]
    public ?\DateTimeInterface $verifyDate;

    /**
     * `new SMSOtpGetStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SMSOtpGetStatusResponse::with(
     *   brandID: ...,
     *   deliveryStatus: ...,
     *   mobilePhone: ...,
     *   referenceID: ...,
     *   requestDate: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SMSOtpGetStatusResponse)
     *   ->withBrandID(...)
     *   ->withDeliveryStatus(...)
     *   ->withMobilePhone(...)
     *   ->withReferenceID(...)
     *   ->withRequestDate(...)
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
        string $brandID,
        string $deliveryStatus,
        string $mobilePhone,
        string $referenceID,
        \DateTimeInterface $requestDate,
        ?\DateTimeInterface $deliveryStatusDate = null,
        ?string $deliveryStatusDetails = null,
        ?\DateTimeInterface $verifyDate = null,
    ): self {
        $self = new self;

        $self['brandID'] = $brandID;
        $self['deliveryStatus'] = $deliveryStatus;
        $self['mobilePhone'] = $mobilePhone;
        $self['referenceID'] = $referenceID;
        $self['requestDate'] = $requestDate;

        null !== $deliveryStatusDate && $self['deliveryStatusDate'] = $deliveryStatusDate;
        null !== $deliveryStatusDetails && $self['deliveryStatusDetails'] = $deliveryStatusDetails;
        null !== $verifyDate && $self['verifyDate'] = $verifyDate;

        return $self;
    }

    /**
     * The Brand ID associated with this OTP request.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * The current delivery status of the OTP SMS message. Common values include: `DELIVERED_HANDSET`, `PENDING`, `FAILED`, `EXPIRED`.
     */
    public function withDeliveryStatus(string $deliveryStatus): self
    {
        $self = clone $this;
        $self['deliveryStatus'] = $deliveryStatus;

        return $self;
    }

    /**
     * The mobile phone number where the OTP was sent, in E.164 format.
     */
    public function withMobilePhone(string $mobilePhone): self
    {
        $self = clone $this;
        $self['mobilePhone'] = $mobilePhone;

        return $self;
    }

    /**
     * The reference ID for this OTP request, used for status queries.
     */
    public function withReferenceID(string $referenceID): self
    {
        $self = clone $this;
        $self['referenceID'] = $referenceID;

        return $self;
    }

    /**
     * The timestamp when the OTP request was initiated.
     */
    public function withRequestDate(\DateTimeInterface $requestDate): self
    {
        $self = clone $this;
        $self['requestDate'] = $requestDate;

        return $self;
    }

    /**
     * The timestamp when the delivery status was last updated.
     */
    public function withDeliveryStatusDate(
        \DateTimeInterface $deliveryStatusDate
    ): self {
        $self = clone $this;
        $self['deliveryStatusDate'] = $deliveryStatusDate;

        return $self;
    }

    /**
     * Additional details about the delivery status.
     */
    public function withDeliveryStatusDetails(
        string $deliveryStatusDetails
    ): self {
        $self = clone $this;
        $self['deliveryStatusDetails'] = $deliveryStatusDetails;

        return $self;
    }

    /**
     * The timestamp when the OTP was successfully verified (if applicable).
     */
    public function withVerifyDate(\DateTimeInterface $verifyDate): self
    {
        $self = clone $this;
        $self['verifyDate'] = $verifyDate;

        return $self;
    }
}
