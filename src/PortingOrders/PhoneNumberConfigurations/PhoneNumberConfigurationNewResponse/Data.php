<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   porting_phone_number_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   user_bundle_id?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies this phone number configuration.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the associated porting phone number.
     */
    #[Api(optional: true)]
    public ?string $porting_phone_number_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * Identifies the associated user bundle.
     */
    #[Api(optional: true)]
    public ?string $user_bundle_id;

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
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $porting_phone_number_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $user_bundle_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $porting_phone_number_id && $obj['porting_phone_number_id'] = $porting_phone_number_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $user_bundle_id && $obj['user_bundle_id'] = $user_bundle_id;

        return $obj;
    }

    /**
     * Uniquely identifies this phone number configuration.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the associated porting phone number.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj['porting_phone_number_id'] = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the associated user bundle.
     */
    public function withUserBundleID(string $userBundleID): self
    {
        $obj = clone $this;
        $obj['user_bundle_id'] = $userBundleID;

        return $obj;
    }
}
