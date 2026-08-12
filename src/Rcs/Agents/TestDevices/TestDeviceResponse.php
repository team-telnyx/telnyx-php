<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\TestDevices;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse\InviteStatus;

/**
 * @phpstan-type TestDeviceResponseShape = array{
 *   inviteStatus: InviteStatus|value-of<InviteStatus>,
 *   phoneNumber: string,
 *   testDeviceID: string,
 * }
 */
final class TestDeviceResponse implements BaseModel
{
    /** @use SdkModel<TestDeviceResponseShape> */
    use SdkModel;

    /** @var value-of<InviteStatus> $inviteStatus */
    #[Required('invite_status', enum: InviteStatus::class)]
    public string $inviteStatus;

    #[Required('phone_number')]
    public string $phoneNumber;

    #[Required('test_device_id')]
    public string $testDeviceID;

    /**
     * `new TestDeviceResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestDeviceResponse::with(inviteStatus: ..., phoneNumber: ..., testDeviceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestDeviceResponse)
     *   ->withInviteStatus(...)
     *   ->withPhoneNumber(...)
     *   ->withTestDeviceID(...)
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
     *
     * @param InviteStatus|value-of<InviteStatus> $inviteStatus
     */
    public static function with(
        InviteStatus|string $inviteStatus,
        string $phoneNumber,
        string $testDeviceID
    ): self {
        $self = new self;

        $self['inviteStatus'] = $inviteStatus;
        $self['phoneNumber'] = $phoneNumber;
        $self['testDeviceID'] = $testDeviceID;

        return $self;
    }

    /**
     * @param InviteStatus|value-of<InviteStatus> $inviteStatus
     */
    public function withInviteStatus(InviteStatus|string $inviteStatus): self
    {
        $self = clone $this;
        $self['inviteStatus'] = $inviteStatus;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withTestDeviceID(string $testDeviceID): self
    {
        $self = clone $this;
        $self['testDeviceID'] = $testDeviceID;

        return $self;
    }
}
