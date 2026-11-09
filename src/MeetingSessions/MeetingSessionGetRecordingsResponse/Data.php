<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   expiresAt: \DateTimeInterface|null, type: string, url: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    #[Required]
    public string $type;

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
        ?\DateTimeInterface $expiresAt,
        string $type,
        string $url
    ): self {
        $self = new self;

        $self['expiresAt'] = $expiresAt;
        $self['type'] = $type;
        $self['url'] = $url;

        return $self;
    }

    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
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

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
