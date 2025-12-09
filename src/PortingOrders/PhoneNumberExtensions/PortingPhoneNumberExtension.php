<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange;

/**
 * @phpstan-type PortingPhoneNumberExtensionShape = array{
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
    /** @use SdkModel<PortingPhoneNumberExtensionShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting phone number extension.
     */
    #[Optional]
    public ?string $id;

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange>|null $activationRanges
     */
    #[Optional('activation_ranges', list: ActivationRange::class)]
    public ?array $activationRanges;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Specifies the extension range for this porting phone number extension.
     */
    #[Optional('extension_range')]
    public ?ExtensionRange $extensionRange;

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    #[Optional('porting_phone_number_id')]
    public ?string $portingPhoneNumberID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Optional('updated_at')]
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
     * @param list<ActivationRange|array{
     *   endAt?: int|null, startAt?: int|null
     * }> $activationRanges
     * @param ExtensionRange|array{
     *   endAt?: int|null, startAt?: int|null
     * } $extensionRange
     */
    public static function with(
        ?string $id = null,
        ?array $activationRanges = null,
        ?\DateTimeInterface $createdAt = null,
        ExtensionRange|array|null $extensionRange = null,
        ?string $portingPhoneNumberID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $activationRanges && $obj['activationRanges'] = $activationRanges;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $extensionRange && $obj['extensionRange'] = $extensionRange;
        null !== $portingPhoneNumberID && $obj['portingPhoneNumberID'] = $portingPhoneNumberID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies this porting phone number extension.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange|array{
     *   endAt?: int|null, startAt?: int|null
     * }> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $obj = clone $this;
        $obj['activationRanges'] = $activationRanges;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Specifies the extension range for this porting phone number extension.
     *
     * @param ExtensionRange|array{
     *   endAt?: int|null, startAt?: int|null
     * } $extensionRange
     */
    public function withExtensionRange(
        ExtensionRange|array $extensionRange
    ): self {
        $obj = clone $this;
        $obj['extensionRange'] = $extensionRange;

        return $obj;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
