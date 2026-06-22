<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\TermsOfServiceGetStatusResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\TermsOfService\TermsOfServiceGetStatusResponse\Data
 *
 * @phpstan-type TermsOfServiceGetStatusResponseShape = array{data: Data|DataShape}
 */
final class TermsOfServiceGetStatusResponse implements BaseModel
{
    /** @use SdkModel<TermsOfServiceGetStatusResponseShape> */
    use SdkModel;

    /**
     * Whether the calling user has agreed to a product's current Terms of Service. The `user_id` is intentionally omitted on this public surface.
     */
    #[Required]
    public Data $data;

    /**
     * `new TermsOfServiceGetStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TermsOfServiceGetStatusResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TermsOfServiceGetStatusResponse)->withData(...)
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
     * Whether the calling user has agreed to a product's current Terms of Service. The `user_id` is intentionally omitted on this public surface.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
