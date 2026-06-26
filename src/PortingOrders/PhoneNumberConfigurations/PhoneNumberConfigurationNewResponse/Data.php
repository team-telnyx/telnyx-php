<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   portingPhoneNumberID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userBundleID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies this phone number configuration.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the associated porting phone number.
     */
    #[Optional('porting_phone_number_id')]
    public ?string $portingPhoneNumberID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Identifies the associated user bundle.
     */
    #[Optional('user_bundle_id')]
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $portingPhoneNumberID && $self['portingPhoneNumberID'] = $portingPhoneNumberID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userBundleID && $self['userBundleID'] = $userBundleID;

        return $self;
    }

    /**
     * Uniquely identifies this phone number configuration.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * Identifies the associated porting phone number.
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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the associated user bundle.
     */
    public function withUserBundleID(string $userBundleID): self
    {
        $self = clone $this;
        $self['userBundleID'] = $userBundleID;

        return $self;
    }
}
