<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProfileListResponseShape = array{
 *   memoryCount: int, profileID: string
 * }
 */
final class ProfileListResponse implements BaseModel
{
    /** @use SdkModel<ProfileListResponseShape> */
    use SdkModel;

    /**
     * Memories stored under this profile, including the consolidated ones that paraphrase others. Listings are ordered by it.
     */
    #[Required('memory_count')]
    public int $memoryCount;

    #[Required('profile_id')]
    public string $profileID;

    /**
     * `new ProfileListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileListResponse::with(memoryCount: ..., profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileListResponse)->withMemoryCount(...)->withProfileID(...)
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
    public static function with(int $memoryCount, string $profileID): self
    {
        $self = new self;

        $self['memoryCount'] = $memoryCount;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * Memories stored under this profile, including the consolidated ones that paraphrase others. Listings are ordered by it.
     */
    public function withMemoryCount(int $memoryCount): self
    {
        $self = clone $this;
        $self['memoryCount'] = $memoryCount;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }
}
