<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage\Meta;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage\Source;

/**
 * @phpstan-type LogMessageShape = array{
 *   code: string,
 *   title: string,
 *   detail?: string|null,
 *   meta?: Meta|null,
 *   source?: Source|null,
 * }
 */
final class LogMessage implements BaseModel
{
    /** @use SdkModel<LogMessageShape> */
    use SdkModel;

    #[Required]
    public string $code;

    #[Required]
    public string $title;

    #[Optional]
    public ?string $detail;

    #[Optional]
    public ?Meta $meta;

    #[Optional]
    public ?Source $source;

    /**
     * `new LogMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LogMessage::with(code: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LogMessage)->withCode(...)->withTitle(...)
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
     * @param Meta|array{
     *   externalConnectionID?: string|null,
     *   telephoneNumber?: string|null,
     *   ticketID?: string|null,
     * } $meta
     * @param Source|array{pointer?: string|null} $source
     */
    public static function with(
        string $code,
        string $title,
        ?string $detail = null,
        Meta|array|null $meta = null,
        Source|array|null $source = null,
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['title'] = $title;

        null !== $detail && $self['detail'] = $detail;
        null !== $meta && $self['meta'] = $meta;
        null !== $source && $self['source'] = $source;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withDetail(string $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    /**
     * @param Meta|array{
     *   externalConnectionID?: string|null,
     *   telephoneNumber?: string|null,
     *   ticketID?: string|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param Source|array{pointer?: string|null} $source
     */
    public function withSource(Source|array $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }
}
