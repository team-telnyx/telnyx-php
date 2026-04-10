<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   phoneNumberID?: string|null,
 *   profilePhotoURL?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Meta phone number ID.
     */
    #[Optional('phone_number_id')]
    public ?string $phoneNumberID;

    /**
     * URL of the business profile photo (served by Meta's CDN). May be empty if no photo is set.
     */
    #[Optional('profile_photo_url')]
    public ?string $profilePhotoURL;

    #[Optional('record_type')]
    public ?string $recordType;

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
        ?string $phoneNumberID = null,
        ?string $profilePhotoURL = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $phoneNumberID && $self['phoneNumberID'] = $phoneNumberID;
        null !== $profilePhotoURL && $self['profilePhotoURL'] = $profilePhotoURL;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Meta phone number ID.
     */
    public function withPhoneNumberID(string $phoneNumberID): self
    {
        $self = clone $this;
        $self['phoneNumberID'] = $phoneNumberID;

        return $self;
    }

    /**
     * URL of the business profile photo (served by Meta's CDN). May be empty if no photo is set.
     */
    public function withProfilePhotoURL(string $profilePhotoURL): self
    {
        $self = clone $this;
        $self['profilePhotoURL'] = $profilePhotoURL;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
