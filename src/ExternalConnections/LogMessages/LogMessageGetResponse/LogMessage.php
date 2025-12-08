<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage\Meta;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage\Source;

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
     *   external_connection_id?: string|null,
     *   telephone_number?: string|null,
     *   ticket_id?: string|null,
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
        $obj = new self;

        $obj['code'] = $code;
        $obj['title'] = $title;

        null !== $detail && $obj['detail'] = $detail;
        null !== $meta && $obj['meta'] = $meta;
        null !== $source && $obj['source'] = $source;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }

    public function withDetail(string $detail): self
    {
        $obj = clone $this;
        $obj['detail'] = $detail;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   external_connection_id?: string|null,
     *   telephone_number?: string|null,
     *   ticket_id?: string|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param Source|array{pointer?: string|null} $source
     */
    public function withSource(Source|array $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }
}
