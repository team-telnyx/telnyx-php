<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\ProfilePreviewResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{profileID: string, text: string|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('profile_id')]
    public string $profileID;

    /**
     * The summary this profile would carry under the candidate note. Null when nothing was generated -- the same signal `GET /summary` uses for a profile with no card yet.
     */
    #[Required]
    public ?string $text;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(profileID: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withProfileID(...)->withText(...)
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
    public static function with(string $profileID, ?string $text): self
    {
        $self = new self;

        $self['profileID'] = $profileID;
        $self['text'] = $text;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * The summary this profile would carry under the candidate note. Null when nothing was generated -- the same signal `GET /summary` uses for a profile with no card yet.
     */
    public function withText(?string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
