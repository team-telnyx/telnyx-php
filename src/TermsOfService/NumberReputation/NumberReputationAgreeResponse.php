<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\NumberReputation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\NumberReputation\NumberReputationAgreeResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\TermsOfService\NumberReputation\NumberReputationAgreeResponse\Data
 *
 * @phpstan-type NumberReputationAgreeResponseShape = array{data: Data|DataShape}
 */
final class NumberReputationAgreeResponse implements BaseModel
{
    /** @use SdkModel<NumberReputationAgreeResponseShape> */
    use SdkModel;

    /**
     * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface — the caller already knows their own identity.
     */
    #[Required]
    public Data $data;

    /**
     * `new NumberReputationAgreeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberReputationAgreeResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberReputationAgreeResponse)->withData(...)
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
     * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface — the caller already knows their own identity.
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
