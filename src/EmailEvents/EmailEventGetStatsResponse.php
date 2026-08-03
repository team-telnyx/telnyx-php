<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventGetStatsResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\EmailEvents\EmailEventGetStatsResponse\Data
 *
 * @phpstan-type EmailEventGetStatsResponseShape = array{data: Data|DataShape}
 */
final class EmailEventGetStatsResponse implements BaseModel
{
    /** @use SdkModel<EmailEventGetStatsResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new EmailEventGetStatsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailEventGetStatsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailEventGetStatsResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
