<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange;

/**
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange
 * @phpstan-import-type ExtensionRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange
 *
 * @phpstan-type PortingPhoneNumberExtensionShape = array{
 *   id?: string|null,
 *   activationRanges?: list<ActivationRangeShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   extensionRange?: null|ExtensionRange|ExtensionRangeShape,
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
     * @param list<ActivationRangeShape> $activationRanges
     * @param ExtensionRangeShape $extensionRange
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $activationRanges && $self['activationRanges'] = $activationRanges;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $extensionRange && $self['extensionRange'] = $extensionRange;
        null !== $portingPhoneNumberID && $self['portingPhoneNumberID'] = $portingPhoneNumberID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies this porting phone number extension.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRangeShape> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $self = clone $this;
        $self['activationRanges'] = $activationRanges;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Specifies the extension range for this porting phone number extension.
     *
     * @param ExtensionRangeShape $extensionRange
     */
    public function withExtensionRange(
        ExtensionRange|array $extensionRange
    ): self {
        $self = clone $this;
        $self['extensionRange'] = $extensionRange;

        return $self;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $self = clone $this;
        $self['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
