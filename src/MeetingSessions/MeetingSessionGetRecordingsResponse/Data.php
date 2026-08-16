<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   expiresAt: string|null, type: string, url: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Expiry timestamp when supplied by the provider, or null. The current adapter returns null.
     */
    #[Required('expires_at')]
    public ?string $expiresAt;

    #[Required]
    public string $type;

    /**
     * Current provider download URL. The API does not guarantee URL lifetime or refresh behavior.
     */
    #[Required]
    public string $url;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(expiresAt: ..., type: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withExpiresAt(...)->withType(...)->withURL(...)
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
        ?string $expiresAt,
        string $type,
        string $url
    ): self {
        $self = new self;

        $self['expiresAt'] = $expiresAt;
        $self['type'] = $type;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Expiry timestamp when supplied by the provider, or null. The current adapter returns null.
     */
    public function withExpiresAt(?string $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Current provider download URL. The API does not guarantee URL lifetime or refresh behavior.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
