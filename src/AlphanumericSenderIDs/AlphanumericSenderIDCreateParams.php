<?php

declare(strict_types=1);

namespace Telnyx\AlphanumericSenderIDs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new alphanumeric sender ID associated with a messaging profile.
 *
 * @see Telnyx\Services\AlphanumericSenderIDsService::create()
 *
 * @phpstan-type AlphanumericSenderIDCreateParamsShape = array{
 *   alphanumericSenderID: string,
 *   messagingProfileID: string,
 *   usLongCodeFallback?: string|null,
 * }
 */
final class AlphanumericSenderIDCreateParams implements BaseModel
{
    /** @use SdkModel<AlphanumericSenderIDCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The alphanumeric sender ID string.
     */
    #[Required('alphanumeric_sender_id')]
    public string $alphanumericSenderID;

    /**
     * The messaging profile to associate the sender ID with.
     */
    #[Required('messaging_profile_id')]
    public string $messagingProfileID;

    /**
     * A US long code number to use as fallback when sending to US destinations.
     */
    #[Optional('us_long_code_fallback')]
    public ?string $usLongCodeFallback;

    /**
     * `new AlphanumericSenderIDCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AlphanumericSenderIDCreateParams::with(
     *   alphanumericSenderID: ..., messagingProfileID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AlphanumericSenderIDCreateParams)
     *   ->withAlphanumericSenderID(...)
     *   ->withMessagingProfileID(...)
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
     */
    public static function with(
        string $alphanumericSenderID,
        string $messagingProfileID,
        ?string $usLongCodeFallback = null,
    ): self {
        $self = new self;

        $self['alphanumericSenderID'] = $alphanumericSenderID;
        $self['messagingProfileID'] = $messagingProfileID;

        null !== $usLongCodeFallback && $self['usLongCodeFallback'] = $usLongCodeFallback;

        return $self;
    }

    /**
     * The alphanumeric sender ID string.
     */
    public function withAlphanumericSenderID(string $alphanumericSenderID): self
    {
        $self = clone $this;
        $self['alphanumericSenderID'] = $alphanumericSenderID;

        return $self;
    }

    /**
     * The messaging profile to associate the sender ID with.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * A US long code number to use as fallback when sending to US destinations.
     */
    public function withUsLongCodeFallback(string $usLongCodeFallback): self
    {
        $self = clone $this;
        $self['usLongCodeFallback'] = $usLongCodeFallback;

        return $self;
    }
}
