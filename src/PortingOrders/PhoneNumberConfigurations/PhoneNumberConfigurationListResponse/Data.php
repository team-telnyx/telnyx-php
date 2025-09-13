<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   portingPhoneNumberID?: string,
 *   recordType?: string,
 *   updatedAt?: \DateTimeInterface,
 *   userBundleID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Uniquely identifies this phone number configuration.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the associated porting phone number.
     */
    #[Api('porting_phone_number_id', optional: true)]
    public ?string $portingPhoneNumberID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Identifies the associated user bundle.
     */
    #[Api('user_bundle_id', optional: true)]
    public ?string $userBundleID;

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
        ?\DateTimeInterface $createdAt = null,
        ?string $portingPhoneNumberID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userBundleID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $portingPhoneNumberID && $obj->portingPhoneNumberID = $portingPhoneNumberID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $userBundleID && $obj->userBundleID = $userBundleID;

        return $obj;
    }

    /**
     * Uniquely identifies this phone number configuration.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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
     * Identifies the associated porting phone number.
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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the associated user bundle.
     */
    public function withUserBundleID(string $userBundleID): self
    {
        $obj = clone $this;
        $obj->userBundleID = $userBundleID;

        return $obj;
    }
}
