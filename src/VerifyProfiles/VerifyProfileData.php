<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifyProfiles\VerifyProfile\Call;
use Telnyx\VerifyProfiles\VerifyProfile\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfile\RecordType;
use Telnyx\VerifyProfiles\VerifyProfile\SMS;

/**
 * @phpstan-type VerifyProfileDataShape = array{data?: VerifyProfile|null}
 */
final class VerifyProfileData implements BaseModel
{
    /** @use SdkModel<VerifyProfileDataShape> */
    use SdkModel;

    #[Optional]
    public ?VerifyProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VerifyProfile|array{
     *   id?: string|null,
     *   call?: Call|null,
     *   createdAt?: string|null,
     *   flashcall?: Flashcall|null,
     *   language?: string|null,
     *   name?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   sms?: SMS|null,
     *   updatedAt?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * } $data
     */
    public static function with(VerifyProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param VerifyProfile|array{
     *   id?: string|null,
     *   call?: Call|null,
     *   createdAt?: string|null,
     *   flashcall?: Flashcall|null,
     *   language?: string|null,
     *   name?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   sms?: SMS|null,
     *   updatedAt?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * } $data
     */
    public function withData(VerifyProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
