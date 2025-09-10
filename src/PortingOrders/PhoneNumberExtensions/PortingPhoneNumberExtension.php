<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange;

/**
 * @phpstan-type porting_phone_number_extension = array{
 *   id?: string|null,
 *   activationRanges?: list<ActivationRange>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   extensionRange?: ExtensionRange|null,
 *   portingPhoneNumberID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PortingPhoneNumberExtension implements BaseModel
{
    /** @use SdkModel<porting_phone_number_extension> */
    use SdkModel;

    /**
     * Uniquely identifies this porting phone number extension.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange>|null $activationRanges
     */
    #[Api('activation_ranges', list: ActivationRange::class, optional: true)]
    public ?array $activationRanges;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Specifies the extension range for this porting phone number extension.
     */
    #[Api('extension_range', optional: true)]
    public ?ExtensionRange $extensionRange;

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    #[Api('porting_phone_number_id', optional: true)]
    public ?string $portingPhoneNumberID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ActivationRange> $activationRanges
     */
    public static function with(
        ?string $id = null,
        ?array $activationRanges = null,
        ?\DateTimeInterface $createdAt = null,
        ?ExtensionRange $extensionRange = null,
        ?string $portingPhoneNumberID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $activationRanges && $obj->activationRanges = $activationRanges;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $extensionRange && $obj->extensionRange = $extensionRange;
        null !== $portingPhoneNumberID && $obj->portingPhoneNumberID = $portingPhoneNumberID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies this porting phone number extension.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $obj = clone $this;
        $obj->activationRanges = $activationRanges;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Specifies the extension range for this porting phone number extension.
     */
    public function withExtensionRange(ExtensionRange $extensionRange): self
    {
        $obj = clone $this;
        $obj->extensionRange = $extensionRange;

        return $obj;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj->portingPhoneNumberID = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
