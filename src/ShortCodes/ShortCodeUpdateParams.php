<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the settings for a specific short code. To unbind a short code from a profile, set the `messaging_profile_id` to `null` or an empty string.
 * To add or update tags, include the tags field as an array of strings.
 *
 * @see Telnyx\Services\ShortCodesService::update()
 *
 * @phpstan-type ShortCodeUpdateParamsShape = array{
 *   messagingProfileID: string, tags?: list<string>|null
 * }
 */
final class ShortCodeUpdateParams implements BaseModel
{
    /** @use SdkModel<ShortCodeUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Required('messaging_profile_id')]
    public string $messagingProfileID;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * `new ShortCodeUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShortCodeUpdateParams::with(messagingProfileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShortCodeUpdateParams)->withMessagingProfileID(...)
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
     * @param list<string>|null $tags
     */
    public static function with(
        string $messagingProfileID,
        ?array $tags = null
    ): self {
        $self = new self;

        $self['messagingProfileID'] = $messagingProfileID;

        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
