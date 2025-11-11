<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange;

/**
 * @phpstan-type PortingPhoneNumberExtensionShape = array{
 *   id?: string|null,
 *   activation_ranges?: list<ActivationRange>|null,
 *   created_at?: \DateTimeInterface|null,
 *   extension_range?: ExtensionRange|null,
 *   porting_phone_number_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class PortingPhoneNumberExtension implements BaseModel
{
    /** @use SdkModel<PortingPhoneNumberExtensionShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting phone number extension.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange>|null $activation_ranges
     */
    #[Api(list: ActivationRange::class, optional: true)]
    public ?array $activation_ranges;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Specifies the extension range for this porting phone number extension.
     */
    #[Api(optional: true)]
    public ?ExtensionRange $extension_range;

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    #[Api(optional: true)]
    public ?string $porting_phone_number_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ActivationRange> $activation_ranges
     */
    public static function with(
        ?string $id = null,
        ?array $activation_ranges = null,
        ?\DateTimeInterface $created_at = null,
        ?ExtensionRange $extension_range = null,
        ?string $porting_phone_number_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $activation_ranges && $obj->activation_ranges = $activation_ranges;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $extension_range && $obj->extension_range = $extension_range;
        null !== $porting_phone_number_id && $obj->porting_phone_number_id = $porting_phone_number_id;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

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
        $obj->activation_ranges = $activationRanges;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Specifies the extension range for this porting phone number extension.
     */
    public function withExtensionRange(ExtensionRange $extensionRange): self
    {
        $obj = clone $this;
        $obj->extension_range = $extensionRange;

        return $obj;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj->porting_phone_number_id = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
